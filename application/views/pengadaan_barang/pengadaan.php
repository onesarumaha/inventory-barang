

<div class="notif-pengadaan" data-notifpengadaan="<?= $this->session->flashdata('notif'); ?>"></div>


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
                <?php if($this->session->userdata('level') == 'Staff Gudang'):  ?>
              <button type="button" class="btn btn--blue mr-3 mt-2 mb-2 btn-show-modal" data-toggle="modal" data-target="#exampleModal">
              [+] Tambah 
            </button>
          <?php endif; ?>
          <!-- <div class="input-group mb-3">
            <input type="text" name="addon_3" placeholder="Search with name ..." class="form form--focus-blue">
            <div class="input-group__append">
              <a href="#" class="btn btn--blue"><span class="fa fa-search"></span></a>
            </div>
          </div> -->
          <table class="table table--blue mb-3">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Status </th>
                <!-- <th>Total </th> -->
                <?php if($this->session->userdata('level') == 'Staff Gudang'):  ?>
                <th colspan="3">Action</th>
              <?php endif; ?>
              <?php if($this->session->userdata('level') == 'Manager'):  ?>
                <th>Action</th>
              <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach($pengadaan as $peng) : ?>
              <tr>
               <td><?= $no++ ?></td>
                <td><?= date('d-M-Y', strtotime($peng['tgl_pengadaan'])) ?></td>
                <td><?= $peng['nama_barang'] ?></td>
                <td><?= $jumlah =  $peng['jumlah'] ?></td>
                <td><?= $peng['status_pengadaan'] ?></td>
                <!-- <td>Rp. <?= @number_format($jumlah * $harga) ?></td> -->
                <td width="10"><center><a data-toggle="modal" data-target="#detail<?= $peng['id_pengadaan'] ?>"><span class="fa fa-eye"></span></a></center></td>
                <?php if($this->session->userdata('level') == 'Staff Gudang'):  ?>

                <td width="10"><center><a data-toggle="modal" data-target="#bisa<?= $peng['id_pengadaan'] ?>"><span class="fa fa-edit"></span></a></center></td>
                 <td width="10"><center><a href="<?= base_url('Pengadaan/hapus_pengadaan') ?>/<?= $peng['id_pengadaan']; ?>" class="hapus-pengadaan"><span class="fa fa-trash"></span></a></center></td>
               <?php endif; ?>
              </tr>

                <div class="modal fade" id="detail<?= $peng['id_pengadaan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Pengadaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="card" style="width:auto;">
                          <div class="card-header">
                            <b><?= $peng['nama_barang'] ?></b>
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Kategori : </b><?= $peng['kategori'] ?></li>
                            <li class="list-group-item"><b>Jenis : </b><?= $peng['jenis_barang'] ?></li>
                            <li class="list-group-item"><b>Qty : </b><?= $peng['jumlah'] ?></li>
                            <li class="list-group-item"><b>Satuan : </b><?= $peng['satuan'] ?></li>
                            <li class="list-group-item"><b>Status : </b><?= $peng['status_pengadaan'] ?></li>
                            <!-- <li class="list-group-item"><b>Harga : </b>Rp. <?= number_format($peng['harga']) ?></li> -->
                             <form action="<?= base_url('Pengadaan/cek_pengadaan') ?>/<?= $peng['id_pengadaan'] ?>" method="POST">
                        <input type="hidden" name="id_pengadaan" value="<?= $peng['id_pengadaan'] ?>">
                        <input type="hidden" name="id_barang" value="<?= $peng['id_barang'] ?>">
                        <input type="hidden" name="jumlah" value="<?= $peng['jumlah'] ?>">
                      <input type="hidden" name="stok" value="<?= $peng['stok'] ?>">
                          </ul>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="submit" class="btn btn-warning">Cek</button> -->
                      </div>
                    </form>
                    </div>
                  </div>
                </div>

              <div class="modal fade" id="bisa<?= $peng['id_pengadaan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Pengadaan Barang</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="<?= base_url('Pengadaan/edit_pengadaan') ?>/<?= $peng['id_pengadaan'] ?>" method="POST">
                        <input type="hidden" name="id_pengadaan" value="<?= $peng['id_pengadaan'] ?>">

                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Nama Barang</label>
                              <input disabled type="text" class="form-control" id="inputEmail4" placeholder="<?= $peng['nama_barang'] ?>">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Kategori</label>
                              <input disabled type="text" class="form-control" id="inputPassword4" placeholder="<?= $peng['kategori'] ?>">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Jenis</label>
                              <input disabled type="text" class="form-control" id="inputEmail4" placeholder="<?= $peng['jenis_barang'] ?>">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Satuan</label>
                              <input disabled type="text" class="form-control" id="inputPassword4" placeholder="<?= $peng['satuan'] ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputAddress">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" id="inputAddress" value="<?= $peng['jumlah'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="inputAddress2">Keterangan</label>
                            <textarea class="form form--focus-blue mt-0" name="keterangan"><?= $peng['ket_pengadaan'] ?></textarea>
                          </div>
                         <!--  <div class="form-group">
                            <label for="inputAddress">Harga</label>
                            <input type="number" name="harga" class="form-control" id="inputAddress" value="<?= $peng['harga'] ?>">
                          </div> -->

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
            <?php if(empty($pengadaan) ) : ?>
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
        <form action="<?= base_url('Pengadaan/submit_pengadaan') ?>" method="post">
          <input type="hidden" name="tgl_pengadaan" value="<?= date('Y-m-d'); ?>">
            <select name="nama_barang" class="form form--focus-blue" required="">
              <option disabled="" selected="">-- Nama Barang --</option>
              <?php foreach($barang as $brg ) : ?>
              <option value="<?= $brg['id_barang'] ?>"><?= $brg['nama_barang'] ?></option>
              <?php endforeach; ?>
              <?php echo form_error('nama_barang','<small class="text-danger pl-3">','</small>'); ?>
            </select>


            <input type="number" name="jumlah" placeholder="Jumlah Barang" class="form form--focus-blue">
             <?php echo form_error('jumlah','<small class="text-danger pl-3">','</small>'); ?>

             <div class="form-group">
                <textarea class="form form--focus-blue mt-0" name="keterangan" placeholder="Keterangan"></textarea>
              </div>

           <!--  <input type="number" name="harga" placeholder="Harga Satuan" class="form form--focus-blue">
             <?php echo form_error('harga','<small class="text-danger pl-3">','</small>'); ?> -->

             <!-- <select name="supplier" class="form form--focus-blue">
              <option selected="">-- Supplier --</option>
              <?php foreach($supplier as $sup ) : ?>
              <option value="<?= $sup['id_supplier'] ?>"><?= $sup['nama_supplier'] ?></option>
            <?php endforeach; ?>
              <?php echo form_error('supplier','<small class="text-danger pl-3">','</small>'); ?>
            </select> -->
                     
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

