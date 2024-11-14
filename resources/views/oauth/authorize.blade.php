<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - Authorization</title>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <style>
        .passport-authorize .container {
            margin-top: 30px;
        }

        .passport-authorize .scopes {
            margin-top: 20px;
        }

        .passport-authorize .buttons {
            margin-top: 25px;
            text-align: center;
        }

        .passport-authorize .btn {
            width: 125px;
        }

        .passport-authorize .btn-approve {
            margin-right: 15px;
        }

        .passport-authorize form {
            display: inline;
        }
    </style>
</head>
<body class="passport-authorize">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">
                        Authorization Request
                    </div>
                    <div class="card-body">
                        <!-- Introduction -->
                        <p><strong>{{ $client->name }}</strong> is requesting permission to access your account.</p>

                        <!-- Scope List -->
                        <div class="scopes">
                            @if(empty($clientScopes))
                                <p>No specific permissions requested.</p>
                            @else
                                <p><strong>This application will be able to:</strong></p>

                                <ul>
                                    @foreach($clientScopes as $scope)
                                        <li>{{ $scope['description'] }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <div class="buttons">
                            <!-- Authorize Button -->
                            <form method="post" action="{{ route('approve') }}">
                                @csrf
                                <input type="hidden" name="state" value="{{ $request->state }}">
                                <input type="hidden" name="client_id" value="{{ $client->getKey() }}">
                                <input type="hidden" name="redirect" value="{{ $request->redirect }}">
                                <input type="hidden" name="scope" value="{{ implode(' ', array_column($clientScopes, 'id')) }}">
                                {{-- <input type="hidden" name="scopes" value="{{ $request->scope }}"> --}}
                                {{-- <input type="hidden" name="auth_token" value="{{ $authToken }}"> --}}
                                <button type="submit" class="btn btn-success btn-approve">Authorize</button>
                            </form>

                            <!-- Deny Button -->
                            <form method="POST" action="{{ route('deny') }}" style="margin-top: 10px;">
                                @csrf
                                <input type="hidden" name="client_id" value="{{ $client->id }}">
                                <input type="hidden" name="redirect" value="{{ $request->redirect }}">
                                <button type="submit" style="background-color: red; color: white;">Deny</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

