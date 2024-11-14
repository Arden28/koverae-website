<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SMS\VonageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Illuminate\Support\Str;
use InvalidArgumentException;

class HomeController extends Controller
{

    public function home(){

        return view('home');
    }

    // About
    public function pricing(){

        return view('pricing');
    }

    // About
    public function about(){

        return view('about');
    }
    // Blog
    public function blog(){

        return view('blog.index');
    }

    public function single(){

        return view('blog.single');
    }

    // Typo
    public function typo(Request $request){

        // Get the subdomain from the URL
        $host = $request->get('esika');
        $subdomain = explode('.', $host)[0]; // Extract the first part before the first dot

        return view('errors.typo', compact('host', 'subdomain'));
    }

    // Test SMS
    public function testSmS(){

        $vonageService = new VonageService();
        // Send SMS
        $vonageService->sendSMS(242065996406, "Salut c'est Koverae");

    }

    public function redirectToProvider(Request $request)
    {
        // Generate the state for CSRF protection
        $request->session()->put('state', $state = Str::random(40));

        $query = http_build_query([
            'client_id' => config('services.koverae.client_id'),
            'redirect_uri' => config('services.koverae.redirect_uri'),
            'response_type' => 'code',
            'scope' => '', // Optional: Specify scopes if necessary
            'state' => $state,
        ]);

        return redirect(config('services.koverae.authorize_url') . '?' . $query);
    }


    public function handleProviderCallback(Request $request)
    {
        
        if ($request->filled('code')) {
            // Ensure that the token exchange happens on the Provider App, not locally
            $response = Http::asForm()->post(config('services.koverae.token_url'), [
                'grant_type' => 'authorization_code',
                'client_id' => config('services.koverae.client_id'),
                'client_secret' => config('services.koverae.client_secret'),
                'redirect_uri' => config('services.koverae.redirect_uri'),
                'code' => $request->code, // Authorization code received from Provider
            ]);

            // Ensure the correct provider URL is being hit
            Log::info('Token request sent to:', ['token_url' => config('services.koverae.token_url')]);
            // Log::info('Token:', $response->json());


            if ($response->failed()) {
                return response()->json($response->json(), $response->status());
            }

            $tokenData = $response->json();
            $accessToken = $tokenData['access_token'];

        //     $account = Http::withHeaders([
        //         'Authorization' => "Bearer " . $accessToken
        //     ])->get(env("OAUTH_SERVER_URI") . 'auth/me')->json();

        //     dd($account);
        }

        // if ($response->failed()) {
        //     return response()->json($response->json(), $response->status());
        // }

        // $accessToken = $response->json()['access_token'];

        // // Retrieve user data from Provider App using the access token
        // $userResponse = Http::withToken($accessToken)->get(config('services.koverae.user_url'));

        // $userData = $userResponse->json();
        // Log::info('User data retrieved from Provider:', $userData);

        // // Store the user locally in the Client App
        // $user = User::updateOrCreate(
        //     ['email' => $userData['email']],
        //     ['name' => $userData['name']]
        // );

        // // Log the user in locally
        // Auth::login($user);

        // return redirect()->route('kovers.home');
    }

    // OAuth Test
    // public function handle(Request $request){
    //     $request->session()->put('state', $state = Str::random(40));

    //     $query = http_build_query([
    //         'client_id'     => env('OAUTH_CLIENT_ID'),
    //         'redirect_uri'  => env('OAUTH_CLIENT_CALLBACK'),
    //         'response_type' => 'code',
    //         'scope'         => '',
    //         'state'         => $state,
    //     ]);

    //     return redirect(env('OAUTH_SERVER_URI') . 'oauth/authorize?' . $query);
    // }
    // public function callback(Request $request)
    // {
    //     if ($request->filled('code')) {
    //         dd($tokenResponse = Http::post(env('OAUTH_SERVER_URI') . 'oauth/token', [
    //             'grant_type'    => 'authorization_code',
    //             'client_id'     => env('OAUTH_CLIENT_ID'),
    //             'client_secret' => env('OAUTH_CLIENT_SECRET'),
    //             'redirect_uri'  => env('OAUTH_CLIENT_CALLBACK'),
    //             'code'          => $request->input('code'),
    //         ]));

    //         $tokenData = $tokenResponse->json();
    //         $accessToken = $tokenData['access_token'];

    //         $account = Http::withHeaders([
    //             'Authorization' => "Bearer " . $accessToken
    //         ])->get(env("OAUTH_SERVER_URI") . 'auth/me')->json();

    //         dd($account);
    //     }
    // }
    // public function handle(Request $request){

    //     $request->session()->put('state', $state = Str::random(40));

    //     $request->session()->put(
    //         'code_verifier', $code_verifier = Str::random(128)
    //     );

    //     $codeChallenge = strtr(rtrim(
    //         base64_encode(hash('sha256', $code_verifier, true))
    //     , '='), '+/', '-_');

    //     $query = http_build_query([
    //         'client_id' => env('OAUTH_CLIENT_ID'),
    //         'redirect_uri' => env('OAUTH_CLIENT_CALLBACK'),
    //         'response_type' => 'code',
    //         'scope' => 'view-profile',
    //         'state' => $state,
    //         'code_challenge' => $codeChallenge,
    //         'code_challenge_method' => 'S256',
    //         // 'prompt' => '', // "none", "consent", or "login"
    //     ]);

    //     return redirect(env('OAUTH_SERVER_URI') . 'oauth/authorize?' . $query);
    // }

    // public function callback(Request $request){
    //     $state = $request->session()->pull('state');

    //     $codeVerifier = $request->session()->pull('code_verifier');

    //     throw_unless(
    //         strlen($state) > 0 && $state === $request->state,
    //         InvalidArgumentException::class
    //     );

    //     $response = Http::asForm()->post(env('OAUTH_SERVER_URI') . 'oauth/token', [
    //         'grant_type' => 'authorization_code',
    //         'client_id' => env('OAUTH_CLIENT_ID'),
    //         'redirect_uri' => env('OAUTH_CLIENT_CALLBACK'),
    //         'code_verifier' => $codeVerifier,
    //         'code' => $request->code,
    //     ]);

    //     return $response->json();
    // }

}
