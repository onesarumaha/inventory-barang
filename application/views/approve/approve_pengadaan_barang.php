
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
                <th>Qty</th>
                <th>Satuan</th>
                <th>Harga </th>
                <th>Total </th>
                <th>Supplier </th>
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
                <td><?= $aku['nama_toko'] ?></td>
                <?php if($this->session->userdata('level') == 'Manager'):  ?>

                <td width="10">
                  <center>
                 
                  <a class="approve-terima-pengadaan" href="<?= base_url('Approve/approve_diterima_pengadaan/')  ?><?= $aku['id_baku'] ?>"><span class="fa fa-check-square-o"></span></a>
                  
                  <a class="approve-tolak-pengadaan" href="<?= base_url('Approve/approve_ditolak_pengadaan/')  ?><?= $aku['id_baku'] ?>"><span class="fa fa-times-rectangle"></span></a>
                </center>
                </td>
              <?php endif ?>
              </tr>




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

 

