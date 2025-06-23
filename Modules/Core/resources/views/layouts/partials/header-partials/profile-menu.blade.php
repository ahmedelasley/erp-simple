<div class="dropdown main-profile-menu nav nav-item nav-link">
    <a class="profile-user d-flex" href=""><img alt="" src="{{URL::asset('assets/back/img/faces/6.jpg')}}"></a>
    <div class="dropdown-menu">
        <div class="main-header-profile bg-primary p-3">
            <div class="d-flex wd-100p">
                <div class="main-img-user"><img alt="" src="{{URL::asset('assets/back/img/faces/6.jpg')}}" class=""></div>
                <div class="mr-3 my-auto">
                    <h6>{{ Auth::user()->name }}</h6><span>Premium Member</span>
                </div>
            </div>
        </div>
        @module('Profile')
            <a class="dropdown-item" href=""><i class="bx bx-user-circle"></i>Profile</a>
            <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bx bx-cog"></i> Edit Profile</a>
        @endmodule

        <a class="dropdown-item" href=""><i class="bx bxs-inbox"></i>Inbox</a>
        <a class="dropdown-item" href=""><i class="bx bx-envelope"></i>Messages</a>
        <a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i> Account Settings</a>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                <i class="bx bx-log-out"></i>{{ __('Sign Out') }}
            </a>
        </form>

    </div>
</div>
