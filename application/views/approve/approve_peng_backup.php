<div class="notif-approvepengadaan" data-notifapprovepengadaan="<?= $this->session->flashdata('notif'); ?>"></div>

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
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Qty</th>
                <th>Status </th>
                <?php if($this->session->userdata('level') == 'Manager'):  ?>
                <th>Approve</th>
              <?php endif ?>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach($pengadaan as $ada) : ?>
              <tr>
               <td><?= $no++ ?></td>
               <td><?= date('d-M-Y', strtotime($ada['tgl_pengadaan'])) ?></td>
                <td><?= $ada['nama_barang'] ?></td>
                <td><?= $ada['kategori'] ?></td>
                <td><?= $ada['jumlah'] ?></td>
                <td><?php 
                    if($ada['status_pengadaan'] == 'Menunggu'){
                      echo "<i>Menunggu Persetujuan</i>";
                    }
                  ?></td>
                <?php if($this->session->userdata('level') == 'Manager'):  ?>

                <td width="10">
                  <center>
                 
                  <a class="approve-terima-pengadaan" href="<?= base_url('Approve/approve_diterima_pengadaan/')  ?><?= $ada['id_pengadaan'] ?>"><span class="fa fa-check-square-o"></span></a>
                  |
                  <a class="approve-tolak-pengadaan" href="<?= base_url('Approve/approve_ditolak_pengadaan/')  ?><?= $ada['id_pengadaan'] ?>"><span class="fa fa-times-rectangle"></span></a>
                </center>
                </td>
              <?php endif ?>
              </tr>




            <?php endforeach; ?>

            </tbody>
          </table>
        </section>
      </div>

          <h5 class="mt-4"></h5>

         
        </section>
      </div>
    </div><!-- row -->
  </main>


 

