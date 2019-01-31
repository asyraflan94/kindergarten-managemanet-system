<ul>
    @if(Auth::user()->role == 'admin')
        <li>
            <a href="dashboard1" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span
                        class="menu-item-parent">Utama</span></a>
        </li>
        <li>
            <a href="{!! URL::to('owner') !!}" title="Owner"><i class="fa fa-lg fa-fw fa-user"></i>
                <span class="menu-item-parent">Pemilik</span></a>
        </li>
        <li>
            <a href="{!! URL::to('organization') !!}" title="Organisasi"><i class="fa fa-lg fa-fw fa-building"></i>
                <span class="menu-item-parent">Organisasi</span>
            </a>
        </li>
        <li>
            <a href="{!! URL::to('config') !!}" title="Configuration"><i class="fa fa-lg fa-fw fa-gear"></i>
                <span class="menu-item-parent">Konfigurasi</span></a>
        </li>
        <li>
            <a href="#" title="Help"><i class="fa fa-lg fa-fw fa-question"></i>
                <span class="menu-item-parent">Bantuan</span></a>
        </li>
    @endif

    @if(Auth::user()->role == 'owner')
        <li>
            <a href="{!! URL::to('dashboard2') !!}" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i>
                <span class="menu-item-parent">Dashboard</span></a>
        </li>
        <li>
            <a href="{!! URL::to('branch') !!}" title="Organisation"><i class="fa fa-lg fa-fw fa-building"></i>
                <span class="menu-item-parent">Cawangan</span></a>
        </li>
        <li>
            <a href="{!! URL::to('staff') !!}" title="Staff"><i class="fa fa-lg fa-fw fa-group"></i>
                <span class="menu-item-parent">Staf</span></a>
        </li>
        <li>
            <a href="#" title="Education"><i class="fa fa-lg fa-fw fa-briefcase"></i>
                <span class="menu-item-parent">Pelajaran</span></a>
            <ul>
                <li>
                    <a href="{!! URL::to('package') !!}" title="Dashboard"><span
                                class="menu-item-parent">Pakej</span></a>
                </li>
                <li class="">
                    <a href="{!! URL::to('subject') !!}" title="Subject"><span
                                class="menu-item-parent">Subjek</span></a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{!! URL::to('configuration') !!}" title="Configuration"><i class="fa fa-lg fa-fw fa-gear"></i>
                <span class="menu-item-parent">Konfigurasi</span></a>
        </li>
        <li>
            <a href="#" title="Help"><i class="fa fa-lg fa-fw fa-question"></i>
                <span class="menu-item-parent">Bantuan</span></a>
        </li>

    @endif

    @if(Auth::user()->role == 'teacher')
        <li>
            <a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span
                        class="menu-item-parent">Utama</span></a>
        </li>
        <li>
            <a href="{!! URL::to('student') !!}" title="Student"><i class="fa fa-lg fa-fw fa-user"></i>
                <span class="menu-item-parent">Pelajar</span></a>
        </li>
        <li>
            <a href="{!! URL::to('message') !!}" title="Message"><i class="fa fa-lg fa-fw fa-envelope"></i>
                <span class="">Mesej</span></a>
        </li>
        <li>
            <a href="{!! URL::to('help') !!}" title="Help"><i class="fa fa-lg fa-fw fa-question"></i> <span
                        class="menu-item-parent">Bantuan</span></a>
        </li>
    @endif

    @if(Auth::user()->role == 'parents')
        <li>
            <a href="{!! URL::to('utama4') !!}" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i>
                <span class="menu-item-parent">Dashboard</span></a>
        </li>
        <li>
            <a href="{!! URL::to('child') !!}" title="Child"><i class="fa fa-lg fa-fw fa-child"></i>
                <span class="menu-item-parent">Anak</span></a>
        </li>
        <li>
            <a href="{!! URL::to('noti') !!}" title="Notification"><i class="fa fa-lg fa-fw fa-bell"></i>
                <span class="menu-item-parent">Notifikasi</span></a>
        </li>
        <li>
            <a href="#" title="Help"><i class="fa fa-lg fa-fw fa-question"></i>
                <span class="menu-item-parent">Bantuan</span></a>
        </li>
    @endif

    @if(Auth::user()->role == 'clerk')
        <li>
            <a href="{!! URL::to('dashboard') !!}" title="Utama"><i class="fa fa-lg fa-fw fa-home"></i>
                <span class="menu-item-parent">Utama</span></a>
        </li>
        <li>
            <a href="{!! URL::to('student/create') !!}" title="Pendaftaran"><i class="fa fa-lg fa-fw fa-user"></i>
                <span class="menu-item-parent">Pendaftaran</span></a>
        </li>
        <li>
            <a href="{!! URL::to('tambah_pelajar') !!}" title="Pendaftaran"><i class="fa fa-lg fa-fw fa-user"></i>
                <span class="menu-item-parent">Pendaftaran 1</span></a>
        </li>
        <li>
            <a href="{!! URL::to('pelajar') !!}" title="Pelajar"><i class="fa fa-lg fa-fw fa-child"></i>
                <span class="menu-item-parent">Pelajar</span></a>
        </li>
        <li>
            <a href="{!! URL::to('parents') !!}" title="Parents"><i class="fa fa-lg fa-fw fa-group"></i>
                <span class="menu-item-parent">Penjaga</span></a>
        </li>
        <li>
            <a href="{!! URL::to('stock') !!}" title="Stok"><i class="fa fa-lg fa-fw fa-shopping-cart"></i> <span
                        class="menu-item-parent">Stok</span></a>
        </li>
        <li>
            <a href="{!! URL::to('help') !!}" title="Help"><i class="fa fa-lg fa-fw fa-question"></i>
                <span class="menu-item-parent">Bantuan</span></a>
        </li>
    @endif
</ul>