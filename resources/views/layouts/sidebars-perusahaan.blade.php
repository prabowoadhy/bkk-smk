<div class="profile-sidebar">
    <!-- SIDEBAR USERPIC -->
    <div class="profile-userpic d-flex align-items-center flex-column">
        <img src="{{ asset('assets/img/avataaars.svg') }}" class="img-responsive mx-auto rounded" alt="">
    </div>
    <!-- END SIDEBAR USERPIC -->
    <!-- SIDEBAR USER TITLE -->
    <div class="profile-usertitle">
        <div class="profile-usertitle-name">
            Nama Perusahaan
        </div>
        <div class="profile-usertitle-job">
            Bidang 
        </div>
    </div>
    <!-- END SIDEBAR USER TITLE -->
    
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
        <ul class="nav flex-column nav-pills">
            <li class="nav-item">
              <a class="nav-link {{ ($data['url'] === 'perusahaan-loker') ? 'active' : '' }}" href="/perusahaan-loker"><i class="fas fa-briefcase"></i> Lamaran Pekerjaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($data['url'] === 'perusahaan-prakerin') ? 'active' : '' }}" href="/perusahaan-prakerin"><i class="fas fa-school"></i> Lamaran Prakerin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($data['url'] === 'perusahaan-profil') ? 'active' : '' }}" href="/perusahaan-profil"><i class="fas fa-users"></i> Profil Perusahaan</a>
            </li>
          </ul>
    </div>
    <!-- END MENU -->
</div>
