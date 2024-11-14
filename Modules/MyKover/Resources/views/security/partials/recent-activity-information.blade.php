<section>
    <header>
        <h5 class="text-lg font-medium text-gray-900">
            {{ __('Recent activity related to your account security') }}
        </h5>
    </header>
    @forelse($notifications as $notification)
    <div class="p-3 k-box" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-75">
                <span class="col-md-5 small">
                    {{ \Carbon\Carbon::parse($notification->date)->format('d M H:i') }} · {{ $notification->country }}
                </span>
                <div class="col-md-7 d-block ">
                    {{ $notification->title }}
                </div>
            </div>
            <a href="{{ route('security.edit.notification') }}" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div>
    @empty
        <div class="p-3 k-box">
            <div class="d-flex">
                <div class="row w-75">
                    <p>{{ __('No new notifications available.') }}</p>
                </div>
                <a href="{{ route('security.edit.notification') }}" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
            </div>
        </div>
    @endforelse

</section>
