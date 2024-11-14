<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Models\Passport\AuthCode;
use App\Models\Passport\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class AuthorizationController extends Controller
{
    public function authorizeClient(Request $request)
    {
        $client = Client::findOrFail($request->client_id);
        $requestedScopes = explode(' ', $request->input('scope', ''));
        $availableScopes = Passport::scopes()->toArray();

        // Filter available scopes based on requested scopes
        $clientScopes = array_filter($availableScopes, function ($scope) use ($requestedScopes) {
            return in_array($scope['id'], $requestedScopes);
        });

        return view('oauth.authorize', [
            'client' => $client,
            'clientScopes' => $clientScopes,
            'availableScopes' => $availableScopes,
            'request' => $request
        ]);
    }

    public function approve(Request $request)
    {
        $user = Auth::user();
        $client = Client::findOrFail($request->client_id);
        $scopes = explode(' ', $request->input('scope', ''));

        // Generate authorization code
        $code = base64_encode(Str::random(40));

        // Store the authorization code and other details
        // Assuming you have a model called AuthorizationCode
        AuthCode::create([
            'id' => $code,
            'user_id' => $user->id ?? null,
            'client_id' => $client->id,
            'scopes' => json_encode($scopes),
        ]);

        return redirect($client->redirect . '?code=' . $code. '&state=' . $request->state);
    }

    public function deny(Request $request)
    {
        $client = Client::findOrFail($request->client_id);
        // $redirectUri = $request->input('redirect');
        $redirectUri = $client->redirect;

        // Handle the denial logic here (e.g., log the denial, notify the client, etc.)

        // Log the denial event
        Log::info('Authorization denied', [
            'user_id' => Auth::id(),
            'client_id' => $client->id,
            'redirect_uri' => $redirectUri
        ]);

        // If it's an API request, return a JSON response
        if ($request->expectsJson()) {
            return Response::json([
                'error' => 'access_denied',
                'error_description' => 'The user denied the request'
            ], 403);
        }
        $error = "Access Denied";

        // For web requests, redirect with an error message
        return redirect($redirectUri. '?error=' . $error. '&state=' . $request->state);

    }
    public function issueToken(Request $request)
    {
        // Validate the request
        $request->validate([
            'grant_type'    => 'required',
            'client_id'     => 'required',
            'client_secret' => 'required',
            'redirect_uri'  => 'required|url',
            'code'          => 'required_if:grant_type,authorization_code',
        ]);

        // Prepare the request data
        $tokenRequest = $request->create(
            env('APP_URL') . '/oauth/token',
            'POST',
            [
                'grant_type'    => $request->grant_type,
                'client_id'     => $request->client_id,
                'client_secret' => $request->client_secret,
                'redirect_uri'  => $request->redirect_uri,
                'code'          => $request->code,
            ]
        );

        // Dispatch the request to the OAuth server
        $response = app()->handle($tokenRequest);

        // Log the response for debugging
        Log::info('Token response', ['body' => $response->getContent()]);

        // Return the response from the OAuth server
        return $response;
    }

    public function refreshToken(Request $request)
    {
        // Validate the request
        $request->validate([
            'grant_type'    => 'required|in:refresh_token',
            'refresh_token' => 'required',
            'client_id'     => 'required',
            'client_secret' => 'required',
        ]);

        // Prepare the request data
        $tokenRequest = $request->create(
            env('APP_URL') . '/oauth/token',
            'POST',
            [
                'grant_type'    => 'refresh_token',
                'refresh_token' => $request->refresh_token,
                'client_id'     => $request->client_id,
                'client_secret' => $request->client_secret,
            ]
        );

        // Dispatch the request to the OAuth server
        $response = app()->handle($tokenRequest);

        // Log the response for debugging
        Log::info('Refresh Token response', ['body' => $response->getContent()]);

        // Return the response from the OAuth server
        return $response;
    }

}
