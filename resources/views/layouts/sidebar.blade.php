<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Medical Health</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    @if(Auth::user()->level == 'admin')
        <!-- Nav Item - Dokter -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('doctors.index') }}">
                <i class="fas fa-user-md"></i>
                <span>Dokter</span>
            </a>
        </li>

        <!-- Nav Item - Perawat -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('perawat.index') }}">
                <i class="fas fa-user-md"></i>
                <span>Perawat</span>
            </a>
        </li>

        <!-- Nav Item - Data Pasien Admin -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePasienAdmin"
                aria-expanded="true" aria-controls="collapsePasienAdmin">
                <i class="fas fa-fw fa-cog"></i>
                <span>Data Pasien</span>
            </a>
            <div id="collapsePasienAdmin" class="collapse" aria-labelledby="headingPasienAdmin" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('pasien_rawat_inap.index') }}">Rawat Inap</a>
                    <a class="collapse-item" href="{{ route('pasien_rawat_jalan.index') }}">Rawat Jalan</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Data Diagnosa -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDiagnosa"
                aria-expanded="true" aria-controls="collapseDiagnosa">
                <i class="fas fa-fw fa-notes-medical"></i>
                <span>Data Diagnosa</span>
            </a>
            <div id="collapseDiagnosa" class="collapse" aria-labelledby="headingDiagnosa" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('diagnosa_rawat_inap.index') }}">Rawat Inap</a>
                    <a class="collapse-item" href="{{ route('diagnosa_rawat_jalan.index') }}">Rawat Jalan</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Data Kamar -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('kamar.index') }}">
                <i class="fas fa-bed"></i>
                <span>Data Kamar</span>
            </a>
        </li>

        <!-- Nav Item - Data Obat -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('obat.index') }}">
                <i class="fas fa-pills"></i>
                <span>Data Obat</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
                aria-expanded="true" aria-controls="collapseLaporan">
                <i class="fas fa-fw fa-file-invoice-dollar"></i>
                <span>Laporan Perawatan</span>
            </a>
            <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('laporan_rawat_inap.index') }}">Rawat Inap</a>
                    <a class="collapse-item" href="{{ route('laporan_rawat_jalan.index') }}">Rawat Jalan</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('administrasi') }}">
                <i class="fas fa-cogs"></i>
                <span>Administrasi</span>
             </a>
        </li>

        
        
    @endif

    @if(Auth::user()->level == 'petugas_pendaftaran')
        <!-- Nav Item - Data Pasien Petugas Pendaftaran -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePasienPendaftaran"
                aria-expanded="true" aria-controls="collapsePasienPendaftaran">
                <i class="fas fa-fw fa-cog"></i>
                <span>Data Pasien</span>
            </a>
            <div id="collapsePasienPendaftaran" class="collapse" aria-labelledby="headingPasienPendaftaran" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('pasien_rawat_inap.index') }}">Rawat Inap</a>
                    <a class="collapse-item" href="{{ route('pasien_rawat_jalan.index') }}">Rawat Jalan</a>
                </div>
            </div>
        </li>
    @endif

    @if(Auth::user()->level == 'dokter')
        <!-- Nav Item - Data Diagnosa Dokter -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDiagnosaDokter"
                aria-expanded="true" aria-controls="collapseDiagnosaDokter">
                <i class="fas fa-fw fa-cog"></i>
                <span>Data Diagnosa </span>
            </a>
            <div id="collapseDiagnosaDokter" class="collapse" aria-labelledby="headingDiagnosaDokter" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('diagnosa_rawat_inap.index') }}">Rawat Inap</a>
                    <a class="collapse-item" href="{{ route('diagnosa_rawat_jalan.index') }}">Rawat Jalan</a>
                </div>
            </div>
        </li>
    @endif

    @if(Auth::user()->level == 'apotek')
    <!-- Nav Item - Data Obat -->
    <li class="nav-item">
            <a class="nav-link" href="{{ route('obat.index') }}">
                <i class="fas fa-pills"></i>
                <span>Data Obat</span>
            </a>
        </li>
    @endif

    @if(Auth::user()->level == 'perawat')
    <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
                aria-expanded="true" aria-controls="collapseLaporan">
                <i class="fas fa-fw fa-file-invoice-dollar"></i>
                <span>Laporan Perawatan</span>
            </a>
            <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('laporan_rawat_inap.index') }}">Rawat Inap</a>
                    <a class="collapse-item" href="{{ route('laporan_rawat_jalan.index') }}">Rawat Jalan</a>
                </div>
            </div>
        </li>
    @endif

</ul>
