<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="{{ route('dashboard') }}">
                    <img class="logo_icon img-responsive" src="{{ asset('assets-admin/images/logo/icon-login.png') }}" alt="#" />
                </a>
            </div>
        </div>
        <div class="sidebar_user_info">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
                <div class="user_img">
                    <img class="img-responsive" src="{{ asset('assets-admin/images/layout_img/user_img.jpg') }}" alt="#" />
                </div>
                <div class="user_info">
                    <h6>Bantuan Sosial</h6>
                    <p>Pemerintah</p>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar_blog_2">
        <ul class="list-unstyled components">

            {{-- Dashboard --}}
            <li>
                <a href="{{ route('dashboard') }}"
                   class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fa fa-dashboard yellow_color"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- Program Bantuan --}}
            <li>
                <a href="{{ route('programs.index') }}"
                   class="{{ request()->is('programs') || request()->is('programs/*') ? 'active' : '' }}">
                    <i class="fa-solid fa-people-group" style="color:#4caf50;"></i>
                    <span>Program Bantuan</span>
                </a>
            </li>

            {{-- Data Warga --}}
            <li>
                <a href="{{ route('warga.index') }}"
                   class="{{ request()->is('warga') || request()->is('warga/*') ? 'active' : '' }}">
                    <i class="fa-solid fa-id-card" style="color:#3498db; font-size:24px;"></i>
                    <span>Data Warga</span>
                </a>
            </li>

            {{-- Data User --}}
            <li>
                <a href="{{ route('users.index') }}"
                   class="{{ request()->is('users') || request()->is('users/*') ? 'active' : '' }}">
                    <i class="fa-solid fa-user-circle" style="color:#2980b9; font-size:24px;"></i>
                    <span>Data User</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
