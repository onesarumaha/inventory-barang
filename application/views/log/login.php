<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Require meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>LOGIN</title>

    <!-- Social network metas -->
    <meta name="author" content="@FikkriReza">
    <meta name="description" content="Open source responsive admin template with Bootstrap framework">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@FikkriReza">
    <meta name="twitter:creator" content="@FikkriReza">

    <meta property="fb:app_id" content="801699283982913">
    <meta property="og:url" content="https://rezafikkri.github.io/Reza-Admin">
    <meta property="og:title" content="Login Page . Reza Admin">
    <meta property="og:description" content="Open source responsive admin template with Bootstrap framework">
    <meta property="og:image" content="https://rezafikkri.github.io/Reza-Admin/dist/img/rezaadmin.jpg">

  <!-- Bootstrap CSS first -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/bootstrap.min.css">
  <!-- then Font Awesome -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- and Reza Admin CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/dist/css/reza-admin.min.css">
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url('assets/Arsha/') ?>assets/img/new.jpeg">
</head>
<body>

  <div class="container-fluid">
    <div class="login">
      <div class="login__content mt-3">
        <div class="login__head">
          <a href="#"><img src="<?= base_url('assets/') ?>dist/img/iconnya.png" height="80px" alt="logo reza"></a>
          <h2 class="mt-3"><b>LOGIN</b></h2>
        </div>
        <div class="login__form">

          <form method="post" action="<?= base_url('Log/') ?>">
        <?= $this->session->flashdata('notif'); ?>
            <div class="input-group mt-0">
              <div class="input-group__prepend">
                <div class="input-group__text"><span class="fa fa-envelope"></span></div>
              </div>
              <input type="text" name="username" placeholder="Username ..." class="form form--focus-blue">
            </div>
            <?php echo form_error('username','<small class="text-danger pl-3">','</small>'); ?>
            <div class="input-group">
              <div class="input-group__prepend">
                <div class="input-group__text"><span class="fa fa-lock"></span></div>
              </div>
              <input type="password" name="password" placeholder="Password ..." class="form form--focus-blue">
            </div>
            <?php echo form_error('password','<small class="text-danger pl-3">','</small>'); ?>
            <div class="login__form-action mt-3">
              <button type="submit" class="btn btn--blue mb-2 mb-sm-0">Login</button>
            </div>
          </form>
        </div>

      </div>
      <!-- <a href="<?= base_url('Log/daftar') ?>" class="btn btn--link mb-3">Daftar Akun </a> -->
    </div><!-- login -->
  </div>

</body>
</html>