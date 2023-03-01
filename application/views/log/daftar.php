<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Require meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Daftar</title>

    <!-- Social network metas -->
    <meta name="author" content="@FikkriReza">
    <meta name="description" content="Open source responsive admin template with Bootstrap framework">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@FikkriReza">
    <meta name="twitter:creator" content="@FikkriReza">

    <meta property="fb:app_id" content="801699283982913">
    <meta property="og:url" content="https://rezafikkri.github.io/Reza-Admin">
    <meta property="og:title" content="Register Page . Reza Admin">
    <meta property="og:description" content="Open source responsive admin template with Bootstrap framework">
    <meta property="og:image" content="https://rezafikkri.github.io/Reza-Admin/dist/img/rezaadmin.jpg">

  <!-- Bootstrap CSS first -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/bootstrap.min.css">
  <!-- then Font Awesome -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- and Reza Admin CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/dist/css/reza-admin.min.css">
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url('assets') ?>/dist/img/Reza_Admin.ico">
</head>
<body>

  <div class="container-fluid">
    <div class="register">
      <div class="register__content mt-3">
        <div class="register__head">
          <a href="../index.html"><img src="<?= base_url('assets') ?>/dist/img/Reza_Admin.svg"></a>
          <h5 class="mt-3">Daftar</h5>
        </div>
        <div class="register__form">
          <form method="post" action="<?= base_url('Log/action_daftar') ?>">
            <div class="form-group mt-0">
              <input type="text" name="nama_lengkap" placeholder="Nama Lengkap " class="form form--focus-blue">
              <?php echo form_error('nama_lengkap','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <select class="form form--focus-blue" name="jk">
                <option selected="">-- Pilih Jenis Kelamin</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
              <?php echo form_error('jk','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form form--focus-blue">
              <?php echo form_error('tempat_lahir','<small class="text-danger pl-3">','</small>'); ?>
            </div>

             <div class="form-group">
              <input type="date" name="tgl_lahir" placeholder="Tanggal Lahir" class="form form--focus-blue">
              <?php echo form_error('tgl_lahir','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <input type="text" name="username" placeholder="Username" class="form form--focus-blue">
              <?php echo form_error('username','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <input type="password" name="password" placeholder="Password " class="form form--focus-blue">
              <?php echo form_error('password','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <input type="password" name="konfirpassword" placeholder="Konfirmasi Password" class="form form--focus-blue">
              <?php echo form_error('konfirpassword','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <textarea name="alamat" class="form form--focus-blue" placeholder="Alamat"></textarea>
              <?php echo form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            

            <div class="register__form-action mt-3">
              <button type="submit" class="btn btn--blue">Register</button>
            </div>
          </form>
          
        </div>
      </div>
      <a href="<?= base_url('Log/') ?>" class="btn btn--link mb-3">Already have account? Login!</a>
    </div>
  </div>

</body>
</html>