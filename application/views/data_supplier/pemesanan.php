
<div class="notif-supplierpemesanan" data-notifsupplierpemesanan="<?= $this->session->flashdata('notif'); ?>"></div>



<main class="main main--ml-sidebar-width">
    <div class="row">
      <header class="main__header col-12 mb-2">
        <div class="main__title">
          <h4><?= $title ?></h4>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $title; ?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ul>
        </div>        
      </header>
         
     <div class="col-md-12 mb-4">
        <section class="main__box">
          
          <table class="table table--blue mb-3">
            <thead>
              <tr>
               <th>No</th>
                <th>Tanggal</th>
                <th>Nama Pemesan</th>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Satuan</th>
                <th>Harga </th>
                <th>Total </th>
                <th colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach($baku as $aku) : ?>
              <tr>
               <td><?= $no++ ?></td>
                <td><?= date('d-M-Y', strtotime($aku['tgl'])) ?></td>
                <td>Mitrajaya Karya Mandiri</td>
                <td><?= $aku['nama_barang'] ?></td>
                <td><?= $qty =  $aku['qty'] ?></td>
                <td><?= $jumlah =  $aku['sat'] ?></td>
                <td>Rp. <?= $harga =  number_format($aku['harga']) ?></td>
                <td>Rp. <?= @number_format($aku['qty'] * $aku['harga']) ?></td>
                <td width="10"><center><a data-toggle="modal" data-target="#exampleModal<?= $aku['id_baku']?>" class="text-hover-red"><span class="fa fa-check-square-o"></span></a></center></td>
               
               
              </tr>

              <div class="modal fade" id="bisa<?= $aku['id_baku'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Produksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('Supplier/edit_supplier') ?>/<?= $aku['id_baku'] ?>" method="POST">
                          <input type="hidden" name="id_baku" value="<?= $aku['id_baku'] ?>">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Nama Supplier</label>
                              <input name="nama_supplier" type="text" class="form-control" id="inputEmail4" value="<?= $aku['nama_supplier'] ?>">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Nama Toko</label>
                              <input name="nama_toko" type="text" class="form-control" id="inputPassword4" value="<?= $aku['nama_toko'] ?>">
                            </div>
                          </div>

                           <div class="form-group">
                            <label for="nohp">No HP</label>
                            <input type="number" name="no_hp" class="form-control" id="nohp" value="<?= $aku['no_hp'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="inputAddress2">Alamat</label>
                            <textarea class="form form--focus-blue mt-0" name="alamat"><?= $aku['alamat'] ?>
                            </textarea>
                          </div>


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Edit</button>
                      </div>
                    </form>

                    </div>
                  </div>
                </div>


                <div class="modal fade" id="exampleModal<?= $aku['id_baku']?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $aku['id_baku']?>" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Pemesanan <?= $aku['id_baku']?> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('Supplier/submit_pemesanan') ?>" method="post">
                          <input type="hidden" name="id_baku" value="<?= $aku['id_baku'] ?>">
                            <div class="card" style="width: 48rem;">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"><h6>Nama Barang </h6><?= $aku['nama_barang']  ?></li>
                                <li class="list-group-item"><h6>Qty </h6><?= $aku['qty']  ?></li>
                                <li class="list-group-item"><h6>Satuan </h6><?= $aku['sat']  ?></li>
                                <li class="list-group-item">
                                  <textarea name="pesan" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Keterangan"></textarea>
                                </li>
                              </ul>
                            </div>
                          
                            
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Selesai</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>





            <?php endforeach; ?>

            </tbody>
            
          </table>
          <?php if(empty($baku) ) : ?>
                  <center> <i style="font-size: 15px;">Data Tidak Ada !</i></center>
                <?php endif; ?>
        </section>
      </div>

          <h5 class="mt-4"></h5>

         
        </section>
      </div>
    </div><!-- row -->
  </main>
  <?php $this->session->unmark_flash('notif'); ?>

  
 

