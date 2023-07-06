<div class="left-side-bar" style="padding-top: 20px">
    <div class="brand-logo">
        <a href="#">
            {{-- <img src=" {{ asset('vendors/images/1.png') }}" alt="" class="dark-logo" /> --}}
            <img src=" {{ asset('vendors/images/2.png') }}" alt="" class="light-logo"/> 
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll" style="padding-top: 20px">
        <div class="sidebar-menu" >
            @if (Auth::guard('masyarakats')->check())
                <ul id="accordion-menu">
                    <li>
                        <a href="{{ route('masyarakat.home') }}" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-house"></span><span class="mtext">Home</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="{{ route('masyarakat.pengaduan.saya') }}" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-clipboard2-data"></span><span class="mtext">Pengaduan Saya</span>
                        </a>
                    </li>
                </ul>
            @elseif(Auth::guard('petugass')->check())
                <ul id="accordion-menu">
                    <li>
                        <a href="{{ route('home') }}" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-house"></span><span class="mtext">Home</span>
                        </a>
                    </li>
                    @if (Auth::guard('petugass')->user()->level == 'admin')
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-table"></span><span class="mtext">Admin</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="/admin/petugas">Data Petugas</a></li>
                                <li><a href="/admin/masyarakat">Data Siswa</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-clipboard-data"></span><span class="mtext">Pengaduan</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="/pengaduan/baru">Baru</a></li>
                            <li><a href="/pengaduan/terverifikasi">Terverifikasi</a></li>
                            <li><a href="/pengaduan/selesai">Selesai</a></li>
                        </ul>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
