<div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="full d-flex align-items-center justify-content-between">

            <!-- Tombol sidebar + tulisan -->
            <div class="d-flex align-items-center">
                <button type="button" id="sidebarCollapse" class="sidebar_toggle me-3">
                    <i class="fa fa-bars"></i>
                </button>

                {{-- <!-- Tulisan Bantuan Sosial -->
                <div class="logo_section">
                    <h1>Bantuan Sosial</h1>
                </div> --}}
            </div>

            <!-- Tombol Logout -->
            <div class="right_topbar">
                <div class="icon_info">
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-sign-out"></i> Logout
                            </button>
                        </form>
                    </li>
                </div>
            </div>

        </div>
    </nav>
</div>
