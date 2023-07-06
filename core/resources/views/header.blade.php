<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
    </div>
    <div class="header-right">
        @auth
            <div class="user-info-dropdown" style="margin: 13px;text-transform: uppercase;">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        {{-- <span class="user-icon">
                            <img src="vendors/images/photo1.jpg" alt="" />
                        </span> --}}
                        <span class="user-name"> {{ Auth::user()->username }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="dropdown-item" type="submit">
                                <i class='dw dw-logout'></i> Logout
                            </button>
                        </form>
                        {{-- <a class="dropdown-item" href="login.html"> Log Out</a> --}}
                    </div>
                </div>
            </div>
        @endauth
    </div>
</div>