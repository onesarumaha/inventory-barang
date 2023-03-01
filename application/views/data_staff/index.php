<div class="notif-staff" data-notifstaff="<?= $this->session->flashdata('notif'); ?>"></div>


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
              [+] Tambah
            </button>

          
          <table class="table table--blue mb-3">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin </th>
                <th>Tanggal Lahir </th>
                <th>Tempat Lahir </th>
                <th>Staff</th>
                <th>Alamat </th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach($staff as $sup) : ?>
              <tr>
               <td><?= $no++ ?></td>
                <td><?= $sup['nama_lengkap'] ?></td>
                <td><?= $sup['jk'] ?></td>
                <td><?= $sup['tgl_lahir'] ?></td>
                <td><?= $sup['tempat_lahir'] ?></td>
                <td><?= $sup['level'] ?></td>
                <td><?= $sup['alamat'] ?></td>
                <!-- <td width="10"><a class="hapus-staff" href="<?= base_url('Staff/hapus_staff/')  ?><?= $sup['id_user']; ?>" class="text-hover-red"><span class="fa fa-trash"></span></a></td> -->
               
                <td width="10"><center><a data-toggle="modal" data-target="#bisa<?= $sup['id_user'] ?>"><span class="fa fa-edit"></span></a></center></td>
              </tr>

              <div class="modal fade" id="bisa<?= $sup['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Supplier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('Staff/edit_staff') ?>/<?= $sup['id_user'] ?>" method="POST">
                          <input type="hidden" name="id_user" value="<?= $sup['id_user'] ?>">

           <div class="form-group mt-0">
              <input type="text" name="nama_lengkap" placeholder="Nama Lengkap " class="form form--focus-blue" value="<?= $sup['nama_lengkap'] ?>">
              <?php echo form_error('nama_lengkap','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <select class="form form--focus-blue" name="jk">
                <option value="<?= $sup['jk'] ?>">-- Pilih Jenis Kelamin --</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
              <?php echo form_error('jk','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form form--focus-blue" value="<?= $sup['tempat_lahir'] ?>">
              <?php echo form_error('tempat_lahir','<small class="text-danger pl-3">','</small>'); ?>
            </div>

             <div class="form-group">
              <input type="date" name="tgl_lahir" placeholder="Tanggal Lahir" class="form form--focus-blue" value="<?= $sup['tgl_lahir'] ?>">
              <?php echo form_error('tgl_lahir','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <input type="text" name="username" placeholder="Username" class="form form--focus-blue" value="<?= $sup['username'] ?>">
              <?php echo form_error('username','<small class="text-danger pl-3">','</small>'); ?>
            </div>


            <div class="form-group">
              <select class="form form--focus-blue" name="level">
                <option value="<?= $sup['level'] ?>">-- Pilih Jenis Staff --</option>
                <option value="Staff Lapangan">Staff Lapangan</option>
                <option value="Staff Gudang">Staff Gudang</option>
                <option value="Staff Produksi">Staff Produksi</option>
              </select>
              <?php echo form_error('level','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <textarea name="alamat" class="form form--focus-blue" placeholder="Alamat"><?= $sup['alamat'] ?></textarea>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Staff/submit_staff/') ?>" method="POST">
          <div class="form-group mt-0">
              <input type="text" name="nama_lengkap" placeholder="Nama Lengkap " class="form form--focus-blue">
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
              <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form form--focus-blue">
              <?php echo form_error('tempat_lahir','<small class="text-danger pl-3">','</small>'); ?>
            </div>

             <div class="form-group">
              <input type="date" name="tgl_lahir" placeholder="Tanggal Lahir" class="form form--focus-blue">
              <?php echo form_error('tgl_lahir','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <input type="text" name="username" placeholder="Username" class="form form--focus-blue">
              <?php echo form_error('username','<small class="text-danger pl-3">','</small>'); ?>
            </div>


            <div class="form-group">
              <select class="form form--focus-blue" name="level">
                <option selected="">-- Pilih Jenis Staff --</option>
                <option value="Staff Lapangan">Staff Lapangan</option>
                <option value="Staff Gudang">Staff Gudang</option>
                <option value="Staff Produksi">Staff Produksi</option>
              </select>
              <?php echo form_error('level','<small class="text-danger pl-3">','</small>'); ?>
            </div>

            <div class="form-group">
              <textarea name="alamat" class="form form--focus-blue" placeholder="Alamat"></textarea>
              <?php echo form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
            </div>  

          <input type="hidden" name="password" value="123456">

          
            
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
