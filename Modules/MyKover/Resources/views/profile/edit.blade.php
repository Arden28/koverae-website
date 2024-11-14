@extends('layouts.app')

@section('page_title', "Personal Information")

@section('content')
<div id="hero" style="height: 1px;">

</div>
<div class="text-black container-md w-100">

    <section class="mt-3 mb-4">
        <div class="row">
            <div class="col-lg-7">
                <h3>{{ __('Your profile information in Koverae services') }}</h3>
                <p>{{ __('Here is your personal information and options for managing it. You can allow other users to see some of them (e.g. your contact details to be easily reachable). You can also see a summary of your profile.') }}</p>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('assets/images/personal-info.png') }}" alt="">
            </div>
        </div>
    </section>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 mb-4 bg-white border rounded sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('mykover::profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 mb-4 bg-white border rounded sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('mykover::profile.partials.update-contact-information-form')
                </div>
            </div>
            <div class="p-4 mb-4 bg-white border rounded sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('mykover::profile.partials.update-address-information')
                </div>
            </div>
            <div class="p-4 mb-4 bg-white border rounded sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('mykover::profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
