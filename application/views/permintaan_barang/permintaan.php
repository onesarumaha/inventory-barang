

<div class="notif-permintaan" data-notifpermintaan="<?= $this->session->flashdata('notif'); ?>"></div>


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
          <!-- <?php if($this->session->userdata('level') == 'Staff Gudang'):  ?>
              <button type="button" class="btn btn--blue mr-3 mt-2 mb-2 btn-show-modal" data-toggle="modal" data-target="#exampleModal">
              [+] Tambah Permintaan
            </button>
          <?php endif; ?> -->
          <?php if($this->session->userdata('level') == 'Staff Lapangan'):  ?>
              <button type="button" class="btn btn--blue mr-3 mt-2 mb-2 btn-show-modal" data-toggle="modal" data-target="#exampleModal">
              [+] Tambah Permintaan
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
                <th>Username</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Qty </th>
                <th>Status </th>
                <?php if($this->session->userdata('level') == 'Staff Lapangan'):  ?>
                <th colspan="2">Action</th>
                <?php endif; ?>
                <?php if($this->session->userdata('level') == 'Manager'):  ?>
                <th>Action</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach($permintaan as $minta) : ?>
              <tr>
               <td><?= $no++ ?></td>
                <td><?= $minta['username'] ?></td>
                <td><?= $minta['nama_barang'] ?></td>
                <td><?= $minta['kategori'] ?></td>
                <td><?= $minta['qty'] ?></td>
                <td><?= $minta['status'] ?></td>
                
                <?php if($this->session->userdata('level') == 'Staff Lapangan'):  ?>
                  <td width="10"><center><a data-toggle="modal" data-target="#detail<?= $minta['id_permintaan'] ?>"><span class="fa fa-eye"></span></a></center></td>
                <td width="10"><center><a data-toggle="modal" data-target="#bisa<?= $minta['id_permintaan'] ?>"><span class="fa fa-edit"></span></a></center></td>
                <?php endif; ?>
              
              </tr>

                <div class="modal fade" id="detail<?= $minta['id_permintaan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="card" style="width: 48rem;">
                          <div class="card-header">
                            <?= $minta['nama_barang'] ?>
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Kategori : </b><?= $minta['kategori'] ?></li>
                            <li class="list-group-item"><b>Jenis : </b><?= $minta['jenis_barang'] ?></li>
                            <li class="list-group-item"><b>Qty : </b><?= $minta['qty'] ?></li>
                            <li class="list-group-item"><b>Satuan : </b><?= $minta['satuan'] ?></li>
                            <li class="list-group-item"><b>Keterangan : </b><?= $minta['ket'] ?></li>
                          </ul>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      </div>
                    </div>
                  </div>
                </div>

              <div class="modal fade" id="bisa<?= $minta['id_permintaan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Permintaan Barang</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="<?= base_url('Permintaan/edit_permintaan') ?>/<?= $minta['id_permintaan'] ?>" method="POST">
                        <input type="hidden" name="id_permintaan" value="<?= $minta['id_permintaan'] ?>">

                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Nama Barang</label>
                              <input disabled type="text" class="form-control" id="inputEmail4" placeholder="<?= $minta['nama_barang'] ?>">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Kategori</label>
                              <input disabled type="text" class="form-control" id="inputPassword4" placeholder="<?= $minta['kategori'] ?>">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Jenis</label>
                              <input disabled type="text" class="form-control" id="inputEmail4" placeholder="<?= $minta['jenis_barang'] ?>">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Satuan</label>
                              <input disabled type="text" class="form-control" id="inputPassword4" placeholder="<?= $minta['satuan'] ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputAddress">Qty</label>
                            <input type="number" name="qty" class="form-control" id="inputAddress" max="<?= $minta['stok'] ?>" value="<?= $minta['qty'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="inputAddress2">Keterangan</label>
                            <textarea class="form form--focus-blue mt-0" name="keterangan"><?= $minta['keterangan'] ?></textarea>
                          </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-warning">Edit</button>

                    </div>
                        </form>

                  </div>
                </div>
              </div>



            <?php endforeach; ?>


            </tbody>
          </table>
           <?php if(empty($permintaan) ) : ?>
                  <div class="alert alert-danger" role="alert">
                  <center> <i style="font-size: 15px;">Data Tidak Ada !</i></center>
                  </div>
                <?php endif; ?>
        </section>

      </div>

          <h5 class="mt-4"></h5>

         
        </section>
      </div>
    </div><!-- row -->
  </main>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Permintaan Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <table class="table table--blue mb-3">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jenis </th>
                <th>Stok </th>
                <th>Satuan </th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach($barang as $brg) : ?>
              <tr>
               <td><?= $no++ ?></td>
                <td><?= $brg['nama_barang'] ?></td>
                <td><?= $brg['kategori'] ?></td>
                <td><?= $brg['jenis_barang'] ?></td>
                <td><?= $brg['stok'] ?></td>
                <td><?= $brg['satuan'] ?></td>
                <td width="10"><a href="<?= base_url('Permintaan/pilih_barang/')  ?><?= $brg['id_barang']; ?>"><span class="fa fa-edit"></span></a></td>
              </tr>
            <?php endforeach; ?>

            </tbody>
          </table>
  
          
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<?php $this->session->unmark_flash('notif'); ?>
 

