
<div class="notif-baku" data-notifbaku="<?= $this->session->flashdata('notif'); ?>"></div>



<main class="main main--ml-sidebar-width">
    <div class="row">
      <header class="main__header col-12 mb-2">
        <div class="main__title">
          <h4><?= $title ?></h4>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('Dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ul>
        </div>        
      </header>
         
     <div class="col-md-12 mb-4">
        <section class="main__box">
              <button type="button" class="btn btn--blue mr-3 mt-2 mb-2 btn-show-modal" data-toggle="modal" data-target="#exampleModal">
              [+] Bahan Baku 
            </button>
         
          <table class="table table--blue mb-3">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
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
                <td><?= $aku['nama_barang'] ?></td>
                <td><?= $qty =  $aku['qty'] ?></td>
                <td><?= $jumlah =  $aku['sat'] ?></td>
                <td>Rp. <?= $harga =  number_format($aku['harga']) ?></td>
                <td>Rp. <?= @number_format($aku['qty'] * $aku['harga']) ?></td>
                <td width="10"><center><a data-toggle="modal" data-target="#detail<?= $aku['id_baku'] ?>"><span class="fa fa-eye"></span></a></center></td>
                <td width="10"><center><a data-toggle="modal" data-target="#bisa<?= $aku['id_baku'] ?>"><span class="fa fa-edit"></span></a></center></td>
                 <td width="10"><center><a href="<?= base_url('Produksi/hapus_baku') ?>/<?= $aku['id_baku']; ?>" class="hapus-baku"><span class="fa fa-trash"></span></a></center></td>
              
              </tr>

                <div class="modal fade" id="detail<?= $aku['id_baku'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Bahan Baku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="card" style="width:auto;">
                          <div class="card-header">
                            <b><?= $aku['nama_barang'] ?></b>
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Qty : </b><?= $aku['qty'] ?></li>
                            <li class="list-group-item"><b>Satuan : </b><?= $aku['sat'] ?></li>
                            <li class="list-group-item"><b>Harga : </b>Rp. <?= number_format($aku['harga']) ?></li>
                            <li class="list-group-item"><b>Keterangan : </b><?= $aku['pesan'] ?></li>
                            <li class="list-group-item"><b>Status : </b>
                              <?php if($aku['status'] == 'Barang Selesai') {
                                echo "Barang Telah Dikirim";
                              }else{
                                echo $aku['status'];
                              } ?>
                              
                            </li>
                            
                             <form action="<?= base_url('Produksi/cek_pengadaan') ?>/<?= $aku['id_baku'] ?>" method="POST">
                        
                        <input type="hidden" name="id_baku" value="<?= $aku['id_baku'] ?>">
                        <input type="hidden" name="status" value="Barang Diterima">
                      <!-- <input type="hidden" name="stok" value="<?= $aku['stok'] ?>"> -->
                          </ul>
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <?php if($aku['status'] == 'Barang Selesai') : ?>
                          <button type="submit" class="btn btn-warning">Cek</button>
                        <?php endif; ?>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="bisa<?= $aku['id_baku'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Bahan Baku</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="<?= base_url('Produksi/edit_baku') ?>/<?= $aku['id_baku'] ?>" method="POST">
                        <input type="hidden" name="id_baku" value="<?= $aku['id_baku'] ?>">

                          <div class="form-group">
                            <label for="inputAddress">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="inputAddress" value="<?= $aku['nama_barang'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="inputAddress">Qty</label>
                            <input type="number" name="qty" class="form-control" id="inputAddress" value="<?= $aku['qty'] ?>">
                          </div>
                          
                          <div class="form-group">
                          <label for="inputAddress">Satuan</label>
                          <select name="satuan" class="form form--focus-blue">
				              <option value="<?= $aku['sat'] ?>" selected="">Satuan</option>
				              <?php foreach($satuan as $sup ) : ?>
				              <option value="<?= $sup['nama_satuan'] ?>"><?= $sup['nama_satuan'] ?></option>
				            <?php endforeach; ?>
				              <?php echo form_error('satuan','<small class="text-danger pl-3">','</small>'); ?>
				            </select>
                          </div>

                          
                          <div class="form-group">
                            <label for="inputAddress">Harga</label>
                            <input type="number" name="harga" class="form-control" id="inputAddress" value="<?= $aku['harga'] ?>">
                          </div> 

                          <div class="form-group">
	                          <label for="inputAddress">Supplier</label>
	                          <select name="supplier" class="form form--focus-blue">
					              <option value="<?= $aku['id_supplier'] ?>">Supplier</option>
					              <?php foreach($supplier as $sup ) : ?>
					              <option value="<?= $sup['id_supplier'] ?>"><?= $sup['nama_supplier'] ?></option>
					            <?php endforeach; ?>
					              <?php echo form_error('supplier','<small class="text-danger pl-3">','</small>'); ?>
					            </select>
					        </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>

                    </div>
                        </form>

                  </div>
                </div>
              </div>
               



            <?php endforeach; ?>

            </tbody>
          </table>
            <?php if(empty($baku) ) : ?>
            <center> <i>Data Tidak Ada !</i></center>
          <?php endif; ?>
        </section>
      </div>

          <h5 class="mt-4"></h5>

         
        </section>
      </div>
    </div><!-- row -->
  </main>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Produksi/submit_baku') ?>" method="post">
          <input type="hidden" name="tgl_pengadaan" value="<?= date('Y-m-d'); ?>">
            <input type="text" name="nama_barang" placeholder="Nama Barang" class="form form--focus-blue">
             <?php echo form_error('nama_barang','<small class="text-danger pl-3">','</small>'); ?>
            <input type="hidden" name="tgl" value="<?= date('Y-m-d')?>" class="form form--focus-blue">


            <input type="number" name="qty" placeholder="Qty" class="form form--focus-blue">
             <?php echo form_error('qty','<small class="text-danger pl-3">','</small>'); ?>

             <select name="satuan" class="form form--focus-blue">
              <option disabled="" selected="">Satuan</option>
              <?php foreach($satuan as $sup ) : ?>
              <option value="<?= $sup['nama_satuan'] ?>"><?= $sup['nama_satuan'] ?></option>
            <?php endforeach; ?>
              <?php echo form_error('satuan','<small class="text-danger pl-3">','</small>'); ?>
            </select>

            <input type="number" name="harga" placeholder="Harga Satuan" class="form form--focus-blue">
             <?php echo form_error('harga','<small class="text-danger pl-3">','</small>'); ?>

            <select name="supplier" class="form form--focus-blue">
              <option selected="">-- Supplier --</option>
              <?php foreach($supplier as $sup ) : ?>
              <option value="<?= $sup['id_supplier'] ?>"><?= $sup['nama_supplier'] ?></option>
            <?php endforeach; ?>
              <?php echo form_error('supplier','<small class="text-danger pl-3">','</small>'); ?>
            </select>
                     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </div>
	</form>
    </div>
  </div>
</div>

 

<?php $this->session->unmark_flash('notif'); ?>
