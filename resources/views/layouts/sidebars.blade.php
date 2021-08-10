<div class="profile-sidebar">
    <!-- SIDEBAR USERPIC -->
    <div class="profile-userpic d-flex align-items-center flex-column">
        <img src="{{ asset('assets/img/avataaars.svg') }}" class="img-responsive mx-auto rounded" alt="">
    </div>
    <!-- END SIDEBAR USERPIC -->
    <!-- SIDEBAR USER TITLE -->
    <div class="profile-usertitle">
        <div class="profile-usertitle-name">
          {{ $data['user']['nama'] }}
            
          </div>
          <div class="profile-usertitle-job">
            Jurusan :
            {{ $data['user']['level'] }}
        </div>
    </div>
    <!-- END SIDEBAR USER TITLE -->
    
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
        <ul class="nav flex-column nav-pills">
            <li class="nav-item">
              <a class="nav-link {{ ($data['url'] === 'siswa-loker') ? 'active' : '' }}" href="/siswa-loker"><i class="fas fa-briefcase"></i> Lamaran Pekerjaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($data['url'] === 'siswa-prakerin') ? 'active' : '' }}" href="/siswa-prakerin"><i class="fas fa-school"></i> Lamaran Prakerin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($data['url'] === 'siswa-profil') ? 'active' : '' }}" href="/siswa-profil"><i class="fas fa-users"></i> Profil Siswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/siswa/logout"><i class="fas fa-sign-out"></i> Logout</a>
            </li>
          </ul>
    </div>
    <!-- END MENU -->
</div>
