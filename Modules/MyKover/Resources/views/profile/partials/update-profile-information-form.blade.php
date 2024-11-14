<section>
    <header>
        <h4 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h4>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Some of this information may be seen by other users of Koverae services.") }}
        </p>
    </header>

    <div class="p-3 k-box border-bottom" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-75">
                <span class="pt-3 pb-3 col-md-5 small">
                    {{ __('Profile Photo') }}
                </span>
                <div class="pt-3 pb-3 col-md-7 d-block">
                    {{ __('A profile photo allows you to personalize your account') }}
                </div>
            </div>
            <div class="p-0 m-0 ml-4 text-right user-avatar w-25">
                <form action="{{ route('profile.update.avatar') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <button type="submit">change</button>
                    <!-- Image Uploader -->
                    <img src="{{ asset('storage/avatars/'.$user->avatar) }}" alt="{{ $user->name }}" class=" img img-fluid rounded-circle">
                    <!-- Image selector -->
                    <div class="bottom-0 select-file d-flex position-absolute justify-content-between w100">
                        <span class="p-1 m-1 border-0 k_select_file_button btn btn-light rounded-circle" onclick="document.getElementById('photo').click();">
                            <i class="bi bi-pencil"></i>
                            <input type="file" name="avatar"  id="photo" required style="display: none;" />
                        </span>
                    </div>
                    {{-- <input type="file" name="avatar"  id="photo" required /> --}}
                    <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                </form>
            </div>
        </div>
    </div>
    <div class="p-3 k-box border-bottom" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-75">
                <span class="col-md-5 small">
                    {{ __('Name') }}
                </span>
                <div class="col-md-7 d-block ">
                   {{ $user->first_name }} {{ $user->name }}
                </div>
            </div>
            <a href="{{ route('profile.edit.name') }}" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div>
    <div class="p-3 k-box border-bottom" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-75">
                <span class="col-md-5 small">
                    {{ __('Date of birth') }}
                </span>
                <div class="col-md-7 d-block ">
                    {{ $user->birthDate() ?? __('Not defined') }}
                </div>
            </div>
            <a href="{{ route('profile.edit.birth') }}" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div>
    <div class="p-3 k-box" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-75">
                <span class="col-md-5 small">
                    {{ __('Gender') }}
                </span>
                <div class="col-md-7 d-block ">
                    {{ $user->gender() ?? __('No defined') }}
                </div>
            </div>
            <a href="{{ route('profile.edit.gender') }}" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="block w-full mt-1" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form> --}}
</section>
