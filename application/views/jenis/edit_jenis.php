<main class="main main--ml-sidebar-width">
    <div class="row">
      <header class="main__header col-12 mb-2">
        <div class="main__title">
          <!-- <h4><?= $title ?></h4> -->
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $title; ?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ul>
        </div>        
      </header>
<div class="col-sm-12">
      <div class="row">
        <div class="col-12">
          <section class="main__box mb-4">
            <h5><?= $title ?></h5>
            <hr>
            <form method="post" action="<?= base_url('Jenis/submit_edit/') ?><?= $Ejenis['id_jenis'] ?>">
              <input type="hidden" name="id_jenis" value="<?= $Ejenis['id_jenis']; ?>">

            <input type="text" name="nama_jenis" value="<?= $Ejenis['nama_jenis'] ?>"  class="form form--focus-blue mt-0">

            
            <button class="btn btn--blue mt-4">Edit</button>
          </section><!-- main__box -->
        </div>
        </form>
      </div><!-- row -->
      </div>
    </div>
  </main>