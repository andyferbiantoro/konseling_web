<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <div class="login-brand">
      <img src="public/assets/img/logo_smp.png" alt="logo" width="50" ><br>
    </div>
  </div><br><br><br><br>
   <!--  <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">LKPS Auditor</a>
      </div> -->
      <ul class="sidebar-menu">

        @if(Auth::user()->role == 'superadmin') 
        <li class="{{(request()->is('superadmin_dashboard')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('superadmin_dashboard') }}"><i class="fas fa-home"></i><span>Beranda</span></a></li>


        <li class="{{(request()->is('superadmin_guru_konseling')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('superadmin_guru_konseling') }}"><i class="fas fa-users"></i><span>Guru Konseling</span></a></li>

        @endif()
        

        <!--  -->

        @if(Auth::user()->role == 'guru_konseling') 
        <li class="{{(request()->is('guru_konseling_dashboard')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('guru_konseling_dashboard') }}"><i class="fas fa-home"></i><span>Beranda</span></a></li>

        <li class="{{(request()->is('kelas')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('kelas') }}"><i class="fas fa-chalkboard"></i><span>Data Kelas</span></a></li>

        <li class="{{(request()->is('siswa')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('siswa') }}"><i class="fas fa-child"></i><span>Data Siswa</span></a></li>


        

        <li class="{{(request()->is('pelanggaran')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('pelanggaran') }}"><i class="fas fa-exclamation-circle"></i><span>Pelanggaran Siswa</span></a></li>

      

          @if((request()->is('tata_tertib_perihal_masuk_sekolah')))
          <li class="nav-item dropdown {{(request()->is('tata_tertib_perihal_masuk_sekolah')) ? 'active' : ''}}">
          @elseif((request()->is('tata_tertib_perihal_larangan_siswa')))
          <li class="nav-item dropdown {{(request()->is('tata_tertib_perihal_larangan_siswa')) ? 'active' : ''}}">
          @elseif((request()->is('tata_tertib_perihal_pakaian_seragam_siswa')))
          <li class="nav-item dropdown {{(request()->is('tata_tertib_perihal_pakaian_seragam_siswa')) ? 'active' : ''}}">
          @elseif((request()->is('tata_tertib_perihal_hak_siswa')))
          <li class="nav-item dropdown {{(request()->is('tata_tertib_perihal_hak_siswa')) ? 'active' : ''}}">
          @else
          <li class="nav-item dropdown">
          @endif
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-bullhorn"></i>
              <span>Tata Tertib</span></a>
              <ul class="dropdown-menu">
                
                <li class="{{(request()->is('tata_tertib_perihal_masuk_sekolah')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('tata_tertib_perihal_masuk_sekolah') }}"><i class="fas fa-circle"></i></i><span>Masuk Sekolah</span></a></li>

                <li class="{{(request()->is('tata_tertib_perihal_larangan_siswa')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('tata_tertib_perihal_larangan_siswa') }}"><i class="fas fa-circle"></i></i><span>Larangan Siswa</span></a></li>

                <li class="{{(request()->is('tata_tertib_perihal_pakaian_seragam_siswa')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('tata_tertib_perihal_pakaian_seragam_siswa') }}"><i class="fas fa-circle"></i></i><span>Seragam Siswa</span></a></li>

                <li class="{{(request()->is('tata_tertib_perihal_hak_siswa')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('tata_tertib_perihal_hak_siswa') }}"><i class="fas fa-circle"></i></i><span>Hak Siswa</span></a></li>

              </ul>
            </li>

             <li class="{{(request()->is('jadwal_bimbingan')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('jadwal_bimbingan') }}"><i class="fas fa-calendar-week"></i><span>Jadwal Bimbingan</span></a></li>

            <li class="{{(request()->is('lihat_feedback')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('lihat_feedback') }}"><i class="fas fa-comments"></i><span>Feedback Siswa</span></a></li>
        @endif()


              @if(Auth::user()->role == 'siswa') 
              <li class="{{(request()->is('siswa_dashboard')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('siswa_dashboard') }}"><i class="fas fa-home"></i><span>Beranda</span></a></li>

              <li class="{{(request()->is('riwayat_bimbingan')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('riwayat_bimbingan') }}"><i class="far fa-clipboard"></i></i><span>Riwayat Bimbingan</span></a></li>

              @if((request()->is('siswa_tata_tertib_perihal_masuk_sekolah')))
              <li class="nav-item dropdown {{(request()->is('siswa_tata_tertib_perihal_masuk_sekolah')) ? 'active' : ''}}">
              @elseif((request()->is('siswa_tata_tertib_perihal_larangan_siswa')))
              <li class="nav-item dropdown {{(request()->is('siswa_tata_tertib_perihal_larangan_siswa')) ? 'active' : ''}}">
              @elseif((request()->is('siswa_tata_tertib_perihal_pakaian_seragam_siswa')))
              <li class="nav-item dropdown {{(request()->is('siswa_tata_tertib_perihal_pakaian_seragam_siswa')) ? 'active' : ''}}">
              @elseif((request()->is('siswa_tata_tertib_perihal_hak_siswa')))
              <li class="nav-item dropdown {{(request()->is('siswa_tata_tertib_perihal_hak_siswa')) ? 'active' : ''}}">
              @else
              <li class="nav-item dropdown">
              @endif
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-bullhorn"></i>
                  <span>Tata Tertib</span></a>
                  <ul class="dropdown-menu">
                    <li class="{{(request()->is('siswa_tata_tertib_perihal_masuk_sekolah')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('siswa_tata_tertib_perihal_masuk_sekolah') }}"><i class="fas fa-circle"></i></i><span>Masuk Sekolah</span></a></li>

                    <li class="{{(request()->is('siswa_tata_tertib_perihal_larangan_siswa')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('siswa_tata_tertib_perihal_larangan_siswa') }}"><i class="fas fa-circle"></i></i><span>Larangan Siswa</span></a></li>

                    <li class="{{(request()->is('siswa_tata_tertib_perihal_pakaian_seragam_siswa')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('siswa_tata_tertib_perihal_pakaian_seragam_siswa') }}"><i class="fas fa-circle"></i></i><span>Seragam Siswa</span></a></li>

                    <li class="{{(request()->is('siswa_tata_tertib_perihal_hak_siswa')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('siswa_tata_tertib_perihal_hak_siswa') }}"><i class="fas fa-circle"></i></i><span>Hak Siswa</span></a></li>

                  </ul>
                </li>



              <li class="{{(request()->is('feedback')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('feedback') }}"><i class="fas fa-comment"></i><span>Feedback</span></a></li>

              @endif()



            </ul>




