{{-- @auth
    @if (Auth::user()->usertype == 'user')
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user-secret" aria-hidden="true"></i>
                <span>{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('user.dashboard.index') }}">
                    <i class="fa fa-user-circle" aria-hidden="true"></i> Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item" href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Log Out
                    </a>
                </form>
            </div>
        </li>
    @endif
@endauth --}}
