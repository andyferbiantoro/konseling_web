<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <div class="login-brand">
      <img src="public/assets/img/logo_smp.png" alt="logo" width="50" ><br>
    </div>
  </div><br><br>
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


        <li class="{{(request()->is('point')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('point') }}"><i class="fas fa-flag"></i><span>Kelola Point</span></a></li>

        <li class="{{(request()->is('pelanggaran')) ? 'active' : ''}}"><a class="nav-link" href="{{ route('pelanggaran') }}"><i class="fas fa-exclamation-circle"></i><span>Pelanggaran Siswa</span></a></li>
        @endif()



      </ul>




