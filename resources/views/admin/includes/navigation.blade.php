<nav class="pcoded-navbar  ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('admin/dist/assets/images/user/avatar-2.jpg') }}"
                        alt="User-Profile-Image">
                    <div class="user-details">
                        <span>John Doe</span>
                        <div id="more-details">UX Designer<i class="fa fa-chevron-down m-l-5"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        <li class="list-group-item"><a href="user-profile.html"><i
                                    class="feather icon-user m-r-5"></i>View Profile</a></li>
                        <li class="list-group-item"><a href="#!"><i
                                    class="feather icon-settings m-r-5"></i>Settings</a></li>
                        <li class="list-group-item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="btn text-white btn-sm btn-danger" type="submit"><i
                                        class="feather icon-log-out m-r-5"></i>Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                @if (Auth::user()->usertype == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('patients.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-user"></i></span><span class="pcoded-mtext">Patient</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('doctors.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-activity"></i></span><span
                                class="pcoded-mtext">Doctor</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('rooms.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Room</span></a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('appointments.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-calendar"></i></span><span
                            class="pcoded-mtext">Appointment</span></a>
                <li class="nav-item">
                    <a href="{{ route('queues.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-users"></i></span><span class="pcoded-mtext">Queue</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('medical_records.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-file-text"></i></span><span class="pcoded-mtext">Medical
                            Record</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('payments.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-credit-card"></i></span><span
                            class="pcoded-mtext">Payment</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('online_consultations.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-message-square"></i></span><span class="pcoded-mtext">Online
                            Consultation</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('doctor_schedules.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-clock"></i></span><span class="pcoded-mtext">Doctor
                            Schedule</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('health_informations.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-info"></i></span><span class="pcoded-mtext">Health
                            Information</span></a>
                </li>

            </ul>

        </div>
    </div>
</nav>
