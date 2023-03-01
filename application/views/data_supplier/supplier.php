


<div class="notif-supplier" data-notifsupplier="<?= $this->session->flashdata('notif'); ?>"></div>


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
              [+] Tambah Supplier
            </button>

        <!--   <div class="input-group mb-3">
            <input type="text" name="addon_3" placeholder="Search with name ..." class="form form--focus-blue">
            <div class="input-group__append">
              <a href="#" class="btn btn--blue"><span class="fa fa-search"></span></a>
            </div>
          </div> -->
          <table class="table table--blue mb-3">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Supplier</th>
                <th>Nama Toko </th>
                <th>No HP </th>
                <th>Alamat </th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach($supplier as $sup) : ?>
              <tr>
               <td><?= $no++ ?></td>
                <td><?= $sup['nama_supplier'] ?></td>
                <td><?= $sup['nama_toko'] ?></td>
                <td><?= $sup['no_hp'] ?></td>
                <td><?= $sup['alamat_supplier'] ?></td>
               <!--  <td width="10"><a class="hapus-supplier" href="<?= base_url('Supplier/hapus_supplier/')  ?><?= $sup['id_supplier']; ?>" class="text-hover-red"><span class="fa fa-trash"></span></a></td> -->
               
                <td width="10"><center><a data-toggle="modal" data-target="#bisa<?= $sup['id_supplier'] ?>"><span class="fa fa-edit"></span></a></center></td>
              </tr>

              <div class="modal fade" id="bisa<?= $sup['id_supplier'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Supplier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('Supplier/edit_supplier') ?>/<?= $sup['id_supplier'] ?>" method="POST">
                          <input type="hidden" name="id_supplier" value="<?= $sup['id_supplier'] ?>">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Nama Supplier</label>
                              <input name="nama_supplier" type="text" class="form-control" id="inputEmail4" value="<?= $sup['nama_supplier'] ?>">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Nama Toko</label>
                              <input name="nama_toko" type="text" class="form-control" id="inputPassword4" value="<?= $sup['nama_toko'] ?>">
                            </div>
                          </div>

                           <div class="form-group">
                            <label for="nohp">No HP</label>
                            <input type="number" name="no_hp" class="form-control" id="nohp" value="<?= $sup['no_hp'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="inputAddress2">Alamat</label>
<textarea class="form form--focus-blue mt-0" name="alamat"><?= $sup['alamat_supplier'] ?></textarea>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Supplier/submit_supplier') ?>" method="post">
            <input type="text" name="nama_supplier" placeholder="Nama Supplier" class="form form--focus-blue mt-0">
            <?php echo form_error('nama_supplier','<small class="text-danger pl-3">','</small>'); ?>

            <input type="text" name="nama_toko" placeholder="Nama Toko" class="form form--focus-blue">
            <?php echo form_error('nama_toko','<small class="text-danger pl-3">','</small>'); ?>

             <input type="number" name="no_hp" placeholder="No Hp" class="form form--focus-blue">
             <?php echo form_error('no_hp','<small class="text-danger pl-3">','</small>'); ?>

            <textarea name="alamat" class="form form--focus-blue" placeholder="alamat"></textarea>
            <?php echo form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
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
 

