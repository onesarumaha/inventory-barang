
<div class="notif-permintaanpesannya" data-notifpermintaanpesannya="<?= $this->session->flashdata('notif'); ?>"></div>



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
              <span class="fa fa-envelope-open-o"></span> Pesan
            </button>
            <?php foreach($pesan as $psn ) : ?>
            <div class="mb-3 col-md-6 col-lg-12">
              <section class="info-box info-box--blue">
                <div class="info-box__icon"><span class="fa fa-envelope-open"></span></div>
                <div class="info-box__description">
                  <h5>Nama Barang : </h5>
                  <h6><?= $psn['nama_barang'] ?></h6>

                  <h5>Isi Pesan : </h5>
                  <h6><?= $psn['isi_pesan'] ?></h6>
                                   
                </div>

                 <div class="info-box__description">
                   <time>
                    <?php 
                        if($psn['status_pesan'] == 'Pesan Diterima') {
                          echo "<i style='color: green;'> Pesan Diterima </i>";
                        }
                    ?>
                <time>
                                   
                </div>

                <div class="info-box__description">
                 <a class="hapus-pesannya" href="<?= base_url('Pesan/hapus_pesan/') ?><?= $psn['id_pesan'] ?>" ><button class="btn btn--red-outline mr-3 mt-2 mb-2"><span class="fa fa-trash-o"></span></button> </a>           
                  <button class="btn btn--orange-outline mr-3 mt-2 mb-2" data-toggle="modal" data-target="#exampleModal<?= $psn['id_pesan']; ?>"><span class="fa fa-edit"></span></button> 
                </div>
               
              </section>
            </div>

<div class="modal fade" id="exampleModal<?= $psn['id_pesan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pesan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Pesan/edit_pesan') ?>/<?= $psn['id_pesan'] ?>" method="POST">
          <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user')?>">
          <input type="hidden" name="id_pesan" value="<?= $psn['id_pesan'] ?>">

             <select name="nama_barang" class="form form--focus-blue ">
              <option value="<?= $psn['id_barang'] ?>">-- Pilih Barang --</option>
              <?php foreach($barang as $brg ) : ?>
              <option value="<?= $brg['id_barang'] ?>"><?= $brg['nama_barang'] ?></option>
              <?php endforeach; ?>
              <?php echo form_error('nama_barang','<small class="text-danger pl-3">','</small>'); ?>
            </select>

            <textarea name="isi_pesan" class="form form--focus-blue" placeholder="Tulis Pesan"><?= $psn['isi_pesan'] ?></textarea>
            <?php echo form_error('isi_pesan','<small class="text-danger pl-3">','</small>'); ?>

        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Edit Pesan</button>
      </div>
      </form>
    </div>
  </div>
</div>



          <?php endforeach; ?>
          <?php if(empty($pesan) ) : ?>
                  <div class="alert alert-danger" role="alert">
                  <center> <i style="font-size: 20px;">Pesan Kosong !</i></center>
                  </div>
                <?php endif; ?>
        </section>

      </div>


         
        </section>
      </div>
    </div><!-- row -->
  </main>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pesan Singkat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
         <form action="<?= base_url('Pesan/submit_pesan') ?>" method="post">

             <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user')?>">

             <select name="nama_barang" class="form form--focus-blue ">
              <option selected="">-- Pilih Barang --</option>
              <?php foreach($barang as $brg ) : ?>
              <option value="<?= $brg['id_barang'] ?>"><?= $brg['nama_barang'] ?></option>
              <?php endforeach; ?>
              <?php echo form_error('nama_barang','<small class="text-danger pl-3">','</small>'); ?>
            </select>

            <textarea name="isi_pesan" class="form form--focus-blue" placeholder="Tulis Pesan"></textarea>
            <?php echo form_error('isi_pesan','<small class="text-danger pl-3">','</small>'); ?>

          </div>
          <div class="modal-footer">
           
            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
          </div>
        </form>
          
            
      </div>
    </div>
  </div>
</div>

 

<?php $this->session->unmark_flash('notif'); ?>
