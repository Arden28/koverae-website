@extends('layouts.app')

@section('page_title', 'Verify OTP')

@section('styles')
<style>

    /* Auth */
    .page-content{
        font-size: 14px;
        line-height: 22px;
        text-decoration: none solid rgb(52, 58, 64);
        word-spacing: 0px;
        background-attachment: fixed;
        background-image: url('../images/background/bg-3.jpg');
        background-repeat: no-repeat;
        height: 100%;
        /* width: auto; */
        /* min-height: 642px; */
        min-width: auto;
    }


</style>
@endsection

@section('content')
<section id="hero" class="justify-content-lg-center d-flex" style="margin: 20px 0 0 0;">
    <div class="shadow k_website_login card">
        <img class="mx-auto k_logo" src="{{ asset('assets/images/logo/logo.png') }}" />
        <div class="card-body">
            <div class="text-center k-alert alert-info">
                <p>
                    {{ new Illuminate\Support\HtmlString(__("Received an email with a login code? If not, click <a class=\"hover:underline\" href=\":url\">here</a>.", ['url' => route('verify.resend')])) }}
                </p>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('verify.store') }}" id="otpForm">
                @csrf

                <div class="mb-3 field-login justify-content-center">
                     <x-input-error :messages="$errors->get('two_factor_code')" class="mt-2" />
                    <div class="text-center input-field">
                        <input type="number" name="two_factor_code[]" required autofocus placeholder="*" />
                        <input type="number" name="two_factor_code[]" required disabled placeholder="*"  />
                        <input type="number" name="two_factor_code[]" required disabled placeholder="*"  />
                        <input type="number" name="two_factor_code[]" required disabled placeholder="*"  />
                        <input type="number" name="two_factor_code[]" required disabled placeholder="*"  />
                        <input type="number" name="two_factor_code[]" required disabled placeholder="*"  />
                    </div>
                </div>

                <div class="clearfix gap-1 pt-3 mb-1 text-center k_login_buttons d-grid">
                    <button class="btn btn-primary float-start text-uppercase w-100" type="submit">
                        {{ __('Verify') }}
                    </button>
                </div>
            </form>

        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const inputs = document.querySelectorAll('input[type="number"]');
            const button = document.querySelector('button[type="submit"]');
            button.disabled = true;  // Initially disable the verify button

            inputs.forEach((input, index) => {
                input.addEventListener('input', () => {
                    input.value = input.value.slice(0, 1); // Ensure each input accepts only one character
                    const nextInput = inputs[index + 1];
                    const prevInput = inputs[index - 1];

                    // Move to next input if current has value
                    if (input.value && nextInput) {
                        nextInput.removeAttribute('disabled');
                        nextInput.focus();
                    }

                    // Check if all inputs are filled
                    button.disabled = !Array.from(inputs).every(input => input.value.length === 1);
                });

                input.addEventListener('keydown', (e) => {
                    if (e.key === "Backspace") {
                        if (input.value === '') {
                            // Focus and clear the previous input if the current is already empty
                            const prevInput = inputs[index - 1];
                            if (prevInput) {
                                e.preventDefault();  // Prevent the default backspace action
                                prevInput.focus();
                                prevInput.value = '';  // Clear the previous input
                                prevInput.removeAttribute('disabled');
                                button.disabled = !Array.from(inputs).every(input => input.value.length === 1); // Update button disabled state
                            }
                        } else {
                            input.value = ''; // Clear current input if it's not empty
                            button.disabled = !Array.from(inputs).every(input => input.value.length === 1); // Update button disabled state
                        }
                    }
                });
            });

            // Set focus on the first input on load
            inputs[0].focus();
        });
    </script>
@endsection

