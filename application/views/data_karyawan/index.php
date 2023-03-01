
<div class="notif-kar" data-notifkar="<?= $this->session->flashdata('notif'); ?>"></div>



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
              <button type="button" class="btn btn--blue mr-3 mt-2 mb-2 btn-show-modal" data-toggle="modal" data-target="#exampleModal">
              [+] Tambah Karyawan
            </button>

          
          <table class="table table--blue mb-3">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin </th>
                <th>Tanggal Lahir </th>
                <th>Tempat Lahir </th>
                <th>Nama Staff</th>
                <th>Bagian</th>
                <th>Alamat </th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach($karyawan as $sup) : ?>
              <tr>
               <td><?= $no++ ?></td>
                <td><?= $sup['nama_karyawan'] ?></td>
                <td><?= $sup['jk_karyawan'] ?></td>
                <td><?= $sup['tanggal_lahir'] ?></td>
                <td><?= $sup['tmp_lahir'] ?></td>
                <td><?= $sup['username'] ?></td>
                <td><?= $sup['level'] ?></td>
                <td><?= $sup['alamat_karyawan'] ?></td>
                <!-- <td width="10"><a class="hapus-kar" href="<?= base_url('Karyawan/hapus_karyawan/')  ?><?= $sup['id_karyawan']; ?>" class="text-hover-red"><span class="fa fa-trash"></span></a></td> -->
               
                <td width="10"><center><a data-toggle="modal" data-target="#bisa<?= $sup['id_karyawan'] ?>"><span class="fa fa-edit"></span></a></center></td>
              </tr>

              <div class="modal fade" id="bisa<?= $sup['id_karyawan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Karyawan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('Karyawan/edit_karyawan') ?>/<?= $sup['id_karyawan'] ?>" method="POST">
                          <input type="hidden" name="id_karyawan" value="<?= $sup['id_karyawan'] ?>">

           <div class="form-group mt-0">
              <input type="text" name="nama_lengkap" placeholder="Nama Karyawan " class="form form--focus-blue" value="<?= $sup['nama_karyawan'] ?>">
              <?php echo form_error('nama_lengkap','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <select class="form form--focus-blue" name="jk">
                <option value="<?= $sup['jk_karyawan'] ?>">-- Pilih Jenis Kelamin --</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
              <?php echo form_error('jk','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form form--focus-blue" value="<?= $sup['tmp_lahir'] ?>">
              <?php echo form_error('tempat_lahir','<small class="text-danger pl-3">','</small>'); ?>
            </div>

             <div class="form-group">
              <input type="date" name="tgl_lahir" placeholder="Tanggal Lahir" class="form form--focus-blue" value="<?= $sup['tanggal_lahir'] ?>">
              <?php echo form_error('tgl_lahir','<small class="text-danger pl-3">','</small>'); ?>
            </div>



            <div class="form-group">
              <select class="form form--focus-blue" name="username">
                <option value="<?= $sup['id_user'] ?>">-- Pilih Nama Staff --</option>
                <?php foreach($staff as $st ) : ?>
                <option value="<?= $st['id_user'] ?>"><?= $st['username'] ?></option>
                <?php endforeach; ?>
              </select>
              <?php echo form_error('username','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <textarea name="alamat" class="form form--focus-blue" placeholder="Alamat"><?= $sup['alamat_karyawan'] ?></textarea>
              <?php echo form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
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

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Karyawan/submit_karyawan/') ?>" method="POST">
          <div class="form-group mt-0">
              <input type="text" name="nama_lengkap" placeholder="Nama Karyawan " class="form form--focus-blue">
              <?php echo form_error('nama_lengkap','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <select class="form form--focus-blue" name="jk">
                <option selected="">-- Pilih Jenis Kelamin --</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
              <?php echo form_error('jk','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form form--focus-blue">
              <?php echo form_error('tanggal_lahir','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form form--focus-blue">
              <?php echo form_error('tempat_lahir','<small class="text-danger pl-3">','</small>'); ?>
            </div>


            <div class="form-group">
              <select class="form form--focus-blue" name="username">
                <option selected="">-- Pilih Nama Staff--</option>
                <?php foreach($staff as $s ) : ?>
                <option value="<?= $s['id_user'] ?>"><?= $s['username'] ?></option>
                <?php endforeach; ?>
              </select>
              <?php echo form_error('username','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <textarea name="alamat" class="form form--focus-blue" placeholder="Alamat"></textarea>
              <?php echo form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
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

 
<?php $this->session->unmark_flash('notif'); ?>
