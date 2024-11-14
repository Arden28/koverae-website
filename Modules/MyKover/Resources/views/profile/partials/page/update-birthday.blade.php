@extends('layouts.app')

@section('page_title', "Birth Date")

@section('content')
<div id="hero" style="height: 1px;">

</div>
<div class="text-black container-md w-100">
    <header class="mb-2 text-left border-bottom">
        <h3><a href="{{ route('profile.edit') }}"><i class="bi bi-arrow-left-circle"></i></a> {{ __('Birth Date') }}</h3>
    </header>
    <section class="p-lg-3">
        <form class="container p-3 rounded k-form" method="post" action="{{ route('profile.update.birth') }}">
            @csrf
            @method('patch')

            <span class="message">{{ __('Koverae may use your date of birth to personalize its services and protect your account.') }}</span>

            <h6 class="mt-3 mb-3">{{ __('Update your birth date') }}</h6>
            <div class="row">
                <div class="col-4">
                    <input type="number" name="day_of_birth" class="form-control" id="day_of_birth" placeholder="JJ" value="{{ $user->day_of_birth }}">
                    <x-input-error :messages="$errors->get('day_of_birth')" class="mt-2" />
                </div>
                <div class="col-4">
                    <select name="month_of_birth" id="month" class="form-control">
                        <option value="">{{ __('Month') }}</option>
                        <option value="1" {{ $user->month_of_birth == 1 ? 'selected' : '' }}>January</option>
                        <option value="2" {{ $user->month_of_birth == 2 ? 'selected' : '' }}>February</option>
                        <option value="3" {{ $user->month_of_birth == 3 ? 'selected' : '' }}>March</option>
                        <option value="4" {{ $user->month_of_birth == 4 ? 'selected' : '' }}>April</option>
                        <option value="5" {{ $user->month_of_birth == 5 ? 'selected' : '' }}>May</option>
                        <option value="6" {{ $user->month_of_birth == 6 ? 'selected' : '' }}>June</option>
                        <option value="7" {{ $user->month_of_birth == 7 ? 'selected' : '' }}>July</option>
                        <option value="8" {{ $user->month_of_birth == 8 ? 'selected' : '' }}>August</option>
                        <option value="9" {{ $user->month_of_birth == 9 ? 'selected' : '' }}>September</option>
                        <option value="10" {{ $user->month_of_birth == 10 ? 'selected' : '' }}>October</option>
                        <option value="11" {{ $user->month_of_birth == 11 ? 'selected' : '' }}>November</option>
                        <option value="12" {{ $user->month_of_birth == 12 ? 'selected' : '' }}>December</option>
                    </select>
                    <x-input-error :messages="$errors->get('month_of_birth')" class="mt-2" />
                </div>
                <div class="col-4">
                    <input type="number" name="year_of_birth" class="form-control" id="year_of_birth" placeholder="YYYY" value="{{ $user->year_of_birth }}">
                    <x-input-error :messages="$errors->get('year_of_birth')" class="mt-2" />
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-end">
                <a href="{{ route('profile.edit') }}" class="p-2 text-decoration-none"><span class="m-2">{{ __('Cancel') }}</span></a>
                <button class="rounded btn btn-primary font-weight-bold" type="submit">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </section>
</div>
@endsection

@section('scripts')

<script>
    // Get the current year and calculate the start and end years
    const currentYear = new Date().getFullYear();
    const startYear = 1960;
    const endYear = currentYear - 18;

    // Get the year select element
    const yearSelect = document.getElementById('year');

    // Populate the year select element
    for (let year = endYear; year >= startYear; year--) {
        const option = document.createElement('option');
        option.value = year;
        option.text = year;
        yearSelect.add(option);
    }
</script>
@endsection
