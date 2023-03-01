<!-- navbar -->
  <nav class="navbar navbar-expand-sm navbar--white">
    <a class="navbar__sidebar-toggler" href="#"><span class="fa fa-bars"></span></a>
    <a class="navbar-brand ml-3" href="#"><img src="<?= base_url('assets/') ?>dist/img/iconnya.PNG" width="120" height="30px" alt="logo reza"></a>
    <button class="navbar-toggler" data-target="#navbarNav" data-toggle="collapse" type="button">
        <span class="fa fa-navicon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

      <ul class="navbar-nav">
          <?php if($this->session->userdata('level') == 'Staff Gudang'):  ?>
       <li class="nav-item navbar__notification">
          <a class="nav-link" href="<?= base_url("Pesan/Pesan_masuk") ?>">
            <span class="fa fa-envelope-open"></span>
            <!-- <span class="navbar__notification-number navbar__notification-number--blue">2</span> -->
          </a>
        </li>
      <?php endif; ?>

        <li class="nav-item navbar__avatar dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
            <!-- <img src="<?= base_url('assets/') ?>dist/img/reza.jpg" alt="avatar image"> -->
            <span><?= $this->session->userdata('level')?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="#" class="dropdown-item"></a>
            <div class="dropdown-divider"></div>
            <a id="keluarkan" href="<?= base_url('log/logout') ?>" class="dropdown-item dropdown-item--hover-red">Logout <span class="fa fa-sign-out"></span></a>
          </div>
        </li>
      </ul>
    </div>
  </nav>