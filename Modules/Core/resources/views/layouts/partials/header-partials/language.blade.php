<ul class="nav">
    <li class="">

        <div class="dropdown nav-item main-header-message ">
            <a class="new nav-link" href="#">
                <span class="mr-0 align-self-center bg-transparent">
                    <img src="{{ URL::asset('assets/back/img/lang/'. app()->getLocale() . '.png') }}" alt="">
                </span>
            </a>

            <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
                {{-- <div class="main-message-list chat-scroll"> --}}
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                    <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item d-flex">
                        <span class="ml-3 align-self-center bg-transparent">
                            <img src="{{ URL::asset('assets/back/img/lang/'. $localeCode . '.png') }}" alt="{{ $properties['native'] }}">
                        </span>
                        <div class="d-flex mx-3">
                            <span class="mt-2">{{ $properties['native'] }}</span>
                        </div>
                    </a>
                    @endforeach

                {{-- </div> --}}
            </div>
        </div>

    </li>
</ul>
