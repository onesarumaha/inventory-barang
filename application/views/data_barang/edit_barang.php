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
            <form method="post" action="<?= base_url('DataBarang/submit_edit/') ?><?= $Ebarang['id_barang'] ?>">
              <input type="hidden" name="id_barang" value="<?= $Ebarang['id_barang']; ?>">

            <input type="text" name="nama_barang" value="<?= $Ebarang['nama_barang'] ?>"  class="form form--focus-blue mt-0">

            <select name="kategori" class="form form--focus-blue">
              <option value="<?= $Ebarang['kategori'] ?>">-- Pilih Kategori --</option>
              <?php foreach($kategori as $kat ) : ?>
              <option value="<?= $kat['nama_kategori'] ?>"><?= $kat['nama_kategori'] ?></option>
            <?php endforeach; ?>
            </select>

             <select name="jenis_barang" class="form form--focus-blue">
              <option value="<?= $Ebarang['jenis_barang'] ?>">-- Pilih Jenis Barang --</option>
              <?php foreach($jenis as $jns ) : ?>
              <option value="<?= $jns['nama_jenis'] ?>"><?= $jns['nama_jenis'] ?></option>
            <?php endforeach; ?>
            </select>

            <input type="number" name="stok" value="<?= $Ebarang['stok'] ?>" class="form form--focus-blue">

            <select name="satuan" class="form form--focus-blue">
              <option value="<?= $Ebarang['satuan'] ?>" selected="">-- Pilih Satuan --</option>
              <?php foreach($satuan as $sat ) :  ?>
              <option value="<?= $sat['nama_satuan'] ?>"><?= $sat['nama_satuan'] ?></option>
              <?php endforeach; ?>
            </select>

            <textarea name="ket" class="form form--focus-blue" placeholder="Your address ..."><?= $Ebarang['ket'] ?></textarea>
            
            <button class="btn btn--blue mt-4">Edit</button>
          </section><!-- main__box -->
        </div>
        </form>
      </div><!-- row -->
      </div>
    </div>
  </main>