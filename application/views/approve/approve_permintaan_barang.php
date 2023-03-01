

<div class="notif-approve" data-notifapprove="<?= $this->session->flashdata('notif'); ?>"></div>


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
                <th>Username</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Qty</th>
                <th>Status </th>
                <?php if($this->session->userdata('level') == 'Manager'):  ?>
                <th>Approve</th>
              <?php endif ?>
              <?php if($this->session->userdata('level') == 'Staff Gudang'):  ?>
                <th>Approve</th>
              <?php endif ?>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach($permintaan as $minta) : ?>
              <tr>
               <td><?= $no++ ?></td>
               <td><?= date('d-M-Y', strtotime($minta['tgl_permintaan'])) ?></td>
                <td><?= $minta['username'] ?></td>
                <td><?= $minta['nama_barang'] ?></td>
                <td><?= $minta['kategori'] ?></td>
                <td><?= $minta['qty'] ?></td>
                <td>
                  <?php 
                    if($minta['status'] == 'Menunggu Persetujuan'){
                      echo "<i>Menunggu Persetujuan</i>";
                    }
                  ?>
                </td>
                <?php if($this->session->userdata('level') == 'Staff Gudang'):  ?>

                <td width="10">
                  <center>
                 
                  <!-- <a data-toggle="modal" data-target="#bisa<?= $minta['id_permintaan'] ?>"><span class="fa fa-check-square-o"></span></a>
                  |
                  <a class="batal-permintaan" href="<?= base_url('Approve/approve_batal') ?>/<?= $minta['id_permintaan'] ?>"><span class="fa fa-times-rectangle"></span></a> -->

                  <!-- <a class="app-permintaan" href="<?= base_url('Approve/approve_terima') ?>/<?= $minta['id_permintaan'] ?>"><span class="fa fa-check-square-o"></span></a> -->
                 
                  

                  <a data-toggle="modal" data-target="#bisaa<?= $minta['id_permintaan'] ?>"><span class="fa fa-check-square-o"></span></a>
                   |
                  <a data-toggle="modal" data-target="#bisa<?= $minta['id_permintaan'] ?>"><span class="fa fa-times-rectangle"></span></a>



                </center>
              </td>
            <?php endif ?>
              </tr>

              <div class="modal fade" id="bisa<?= $minta['id_permintaan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tolak Permintaan Barang</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="<?= base_url('Approve/approve_batal') ?>/<?= $minta['id_permintaan'] ?>" method="POST">
                        <input type="hidden" name="id_permintaan" value="<?= $minta['id_permintaan'] ?>">
                          <input type="hidden" name="qty" value="<?= $minta['qty'] ?>">
                          <input type="hidden" name="stok" value="<?= $minta['stok'] ?>">
                          <div class="form-group">
                            <label for="inputAddress2">Keterangan</label>
                <textarea class="form form--focus-blue mt-0" name="keterangan"></textarea>
                          </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn--gray" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn--red">Ditolak</button>

                    </div>
                        </form>

                  </div>
                </div>
              </div>

              <div class="modal fade" id="bisaa<?= $minta['id_permintaan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Permintaan Barang</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="<?= base_url('Approve/approve_minta') ?>/<?= $minta['id_permintaan'] ?>" method="POST">
                        <input type="hidden" name="id_permintaan" value="<?= $minta['id_permintaan'] ?>">
                        <input type="hidden" name="id_barang" value="<?= $minta['id_barang'] ?>">
                       <!--  <select class="form-control mb-4" name="status">
                          <option value="Ditolak">Ditolak</option>
                          <option value="Diterima">Diterima</option>
                        </select> -->
                          <label>Yakin Approve Permintaan Barang ?</label>
                          <input type="hidden" class="form-control" name="qty" value="<?= $minta['qty'] ?>">
                          <input type="hidden" class="form-control" name="stok" value="<?= $minta['stok'] ?>">
                          <input type="hidden" name="stok" value="<?= $minta['stok'] ?>">
                          <!-- <div class="form-group">
                            <label for="inputAddress2">Keterangan</label>
                <textarea class="form form--focus-blue mt-0" name="keterangan"></textarea>
                          </div> -->
                    </div>
                    <div class="modal-footer">
                     
                      <button type="submit" class="btn btn--blue">Ya</button>

                    </div>
                        </form>

                  </div>
                </div>
              </div>



            <?php endforeach; ?>

            </tbody>

          </table>
          <?php if(empty($permintaan) ) : ?>
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
 

