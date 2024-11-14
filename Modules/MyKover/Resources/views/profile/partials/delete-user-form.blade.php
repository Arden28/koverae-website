<section>
    <header>
        <h4 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h4>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.") }}
        </p>
    </header>

    <button class="btn btn-danger font-weight-bold"x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Delete Account') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 mt-3">
            @csrf
            @method('delete')

            <h5 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h5>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6 mb-3">
                <label for="password">{{ __('Password') }}</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <span class="btn btn-secondary font-weight-bold" x-on:click="$dispatch('close')">{{ __('Cancel') }}</span>

                <button type="submit" class="btn btn-danger font-weight-bold">{{ __('Delete Account') }}</button>
            </div>
        </form>
    </x-modal>
</section>
