<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">

            <div class="">
                <div class="main-menu-header">
                    @if (Auth::user()->image)
                        <img class="img-radius" src="{{ Storage::url(Auth::user()->image) }}" alt="User-Profile-Image">
                    @else
                        <img class="img-radius" src="{{ asset('admin/dist/assets/images/user/avatar-2.jpg') }}"
                            alt="Default-Profile-Image">
                    @endif
                    <div class="user-details">
                        <span>{{ Auth::user()->name }}</span>
                    </div>
                </div>

                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        <li class="list-group-item">
                            <a href="{{ route('profile.edit') }}" :active="request() - > routeIs('profile.edit')">
                                <i class="feather icon-user m-r-5"></i>View Profile
                            </a>
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li class="list-group-item">
                                <a href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="feather icon-log-out m-r-5"></i>{{ __('Log Out') }}
                                </a>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Home</label>
                </li>
                @if (Auth::check())
                    @if (Auth::user()->usertype == 'admin')
                        <li class="nav-item">
                            <a href="{{ route('admin/dashboard') }}" class="nav-link">
                                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                <span class="pcoded-mtext">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin/doctors') }}" class="nav-link">
                                <span class="pcoded-micon"><i class="feather icon-activity"></i></span>
                                <span class="pcoded-mtext">Doctor</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin/rooms') }}" class="nav-link">
                                <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                                <span class="pcoded-mtext">Room</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin/patients') }}" class="nav-link">
                                <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                <span class="pcoded-mtext">Patient</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user_list.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                        class="feather icon-user"></i></span><span class="pcoded-mtext">User</span></a>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                            <label>Other</label>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin/appointments') }}" class="nav-link">
                                <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                                <span class="pcoded-mtext">Appointment</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin/schedules') }}" class="nav-link">
                                <span class="pcoded-micon"><i class="feather icon-calendar"></i></span>
                                <span class="pcoded-mtext">Doctor's Schedule</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin/queues') }}" class="nav-link">
                                <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                <span class="pcoded-mtext">Queue</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin/medical_records') }}" class="nav-link">
                                <span class="pcoded-micon"><i class="feather icon-file-text"></i></span>
                                <span class="pcoded-mtext">Medical Record</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin/payments') }}" class="nav-link">
                                <span class="pcoded-micon"><i class="feather icon-credit-card"></i></span>
                                <span class="pcoded-mtext">Payment</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin/online_consultations') }}" class="nav-link">
                                <span class="pcoded-micon"><i class="feather icon-message-square"></i></span>
                                <span class="pcoded-mtext">Online Consultation</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin/health_informations') }}" class="nav-link">
                                <span class="pcoded-micon"><i class="feather icon-info"></i></span>
                                <span class="pcoded-mtext">Health Information</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <span class="pcoded-micon"><i class="fa fa-sign-in" aria-hidden="true"></i></span>
                                <span class="pcoded-mtext">Login</span>
                            </a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav
