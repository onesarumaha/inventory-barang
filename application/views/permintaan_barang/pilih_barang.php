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
            <form method="post" action="<?= base_url('Permintaan/submit_permintaan/') ?><?= $Pbarang['id_barang'] ?>">
              <input type="hidden" name="id_barang" value="<?= $Pbarang['id_barang']; ?>">

            

            <div class="col-md-12 mb-4">

          <div class="form-row">
                    </div>
                      <table class="table table--green mb-3">
                        <thead>
                           <!-- <input type="text" name="id_barang" value="<?= $Pbarang['id_barang'] ?>"> -->
                          <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user')?>">
                          <input type="hidden" name="tgl_permintaan" value="<?= date('Y-m-d H:i:s') ?>">
                          <tr>
                            <th style="width: 200px;">Nama Barang</th>
                            <th>
                              <?= $Pbarang['nama_barang'] ?>
                              <input type="hidden" name="nama_barang" value="<?= $Pbarang['nama_barang'] ?>">
                            </th>
                          </tr>
                          <tr>
                            <th style="width: 200px;">Kategori</th>
                            <th><?= $Pbarang['kategori'] ?>
                              <input type="hidden" name="kategori" value="<?= $Pbarang['kategori'] ?>">
                            </th>
                          </tr>
                          <tr>
                            <th style="width: 200px;">Jenis</th>
                            <th><?= $Pbarang['jenis_barang'] ?>
                              <input type="hidden" name="jenis_barang" value="<?= $Pbarang['jenis_barang'] ?>">
                            </th>
                          </tr>
                          <tr>
                            <th style="width: 200px;">Sisa Stok</th>
                            <th><?= $Pbarang['stok'] ?></th>
                          </tr>

                          <?php 
                          $sisa = $Pbarang['stok'] - 10 ;
                           ?>
                          <tr>
                            <th style="width: 200px; vertical-align: middle;">Jumlah Permintaan</th>
                            <th>
                              <input type="number" name="qty" max="<?= $sisa; ?>" class="form form--focus-blue mt-0"  required oninvalid="this.setCustomValidity('Barang Tidak Cukup')" oninput="setCustomValidity('')">
                              <?php echo form_error('qty','<small class="text-danger pl-3">','</small>'); ?>

                            </th>
                          </tr>
                          <tr>
                            <th style="width: 200px; vertical-align: middle;">Keterangan</th>
                            <th><textarea class="form form--focus-blue mt-0" name="keterangan"></textarea>
                              <?php echo form_error('keterangan','<small class="text-danger pl-3">','</small>'); ?>
                            </th>
                          </tr>
                        </thead>

                      </table>
                      
                  </div>
            
            <button class="btn btn--green mt-4">Input</button>
          </section><!-- main__box -->
        </div>
        </form>
      </div><!-- row -->
      </div>
    </div>
  </main>