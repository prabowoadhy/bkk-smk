<div class="profile-sidebar">
    <!-- SIDEBAR USERPIC -->
    <div class="profile-userpic d-flex align-items-center flex-column">
        <img src="{{ asset('assets/img/avataaars.svg') }}" class="img-responsive mx-auto rounded" alt="">
    </div>
    <!-- END SIDEBAR USERPIC -->
    <!-- SIDEBAR USER TITLE -->
    <div class="profile-usertitle">
        <div class="profile-usertitle-name">
          {{ $user->nama }}
          </div>
          <div class="profile-usertitle-job">
            {{ $user->sekolah_asal }}
        </div>
    </div>
    <!-- END SIDEBAR USER TITLE -->
    
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
        <ul class="nav flex-column nav-pills">
          @auth('alumni')
          <li class="nav-item">
            <a class="nav-link {{ ($url === 'alumni-loker') ? 'active' : '' }}" href="/alumni-loker"><i class="fas fa-briefcase"></i> Lamaran Pekerjaan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($url === 'alumni-profil') ? 'active' : '' }}" href="/alumni-profil"><i class="fas fa-users"></i> Profil Alumni</a>
          </li>
          @endauth
          @auth('siswa')
          <li class="nav-item">
            <a class="nav-link {{ ($url === 'siswa-prakerin') ? 'active' : '' }}" href="/siswa-prakerin"><i class="fas fa-school"></i> Lamaran Prakerin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($url === 'siswa-profil') ? 'active' : '' }}" href="/siswa-profil"><i class="fas fa-users"></i> Profil Siswa</a>
          </li>
          @endauth        
            <li class="nav-item">
              <a class="nav-link " href="/siswa/logout"><i class="fas fa-sign-out"></i> Logout</a>
            </li>
          </ul>
    </div>
    <!-- END MENU -->
</div>
