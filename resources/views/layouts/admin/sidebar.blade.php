<nav id="sidebar" class="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar_user_info">
            <div class="user_profle_side">

                @php
                    $user = Auth::user();
                    $photo =
                        $user && $user->profile_picture
                            ? asset('storage/' . $user->profile_picture)
                            : asset('assets-admin/images/layout_img/placeholder.jpeg');
                @endphp

                <div class="user_img">
                    <img src="{{ $photo }}" class="rounded-circle"
                        style="width:80px; height:80px; object-fit:cover;">
                </div>

                <div class="user_info">
                    <h6>{{ $user->name ?? 'User' }}</h6>
                    <p>• {{ $user->role ?? '-' }}</p>
                </div>

            </div>
        </div>
    </div>


    <div class="sidebar_blog_2">
        <ul class="list-unstyled components">

            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" title="Dashboard"> <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ request()->is('warga*') ? 'active' : '' }}">
                <a href="{{ route('warga.index') }}" title="Data Warga"> <i class="fa fa-id-card"></i>
                    <span>Data Warga</span>
                </a>
            </li>

            <li class="{{ request()->is('programs*') ? 'active' : '' }}">
                <a href="{{ route('programs.index') }}" title="Program Bantuan"> <i class="fa fa-people-group"></i>
                    <span>Program Bantuan</span>
                </a>
            </li>

            <li class="{{ request()->is('pendaftar*') ? 'active' : '' }}">
                <a href="{{ route('pendaftar.index') }}" title="Pendaftar Bantuan"> <i
                        class="fa fa-file-signature"></i>
                    <span>Pendaftar Bantuan</span>
                </a>
            </li>

            <li class="{{ request()->is('verifikasi*') ? 'active' : '' }}">
                <a href="{{ route('verifikasi.index') }}" title="Verifikasi Lapangan"> <i
                        class="fa fa-clipboard-check"></i>
                    <span>Verifikasi Lapangan</span>
                </a>
            </li>

            <li class="{{ request()->is('penerima*') ? 'active' : '' }}">
                <a href="{{ route('penerima.index') }}" title="Penerima Bantuan"> <i
                        class="fa fa-people-carry-box"></i>
                    <span>Penerima Bantuan</span>
                </a>
            </li>

            <li class="{{ request()->is('riwayat*') ? 'active' : '' }}">
                <a href="{{ route('riwayat.index') }}" title="Riwayat Penyaluran"> <i
                        class="fa fa-clock-rotate-left"></i>
                    <span>Riwayat Penyaluran</span>
                </a>
            </li>

            <li class="{{ request()->is('users*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" title="Data User"> <i class="fa fa-user-circle"></i>
                    <span>Data User</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
