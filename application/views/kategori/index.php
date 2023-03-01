

<div class="notif-datakat" data-notifdatakat="<?= $this->session->flashdata('notif'); ?>"></div>


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
              [+] Tambah Kategori
            </button>

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
                <th>Nama Kategori</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach($kategori as $kat) : ?>
              <tr>
               <td><?= $no++ ?></td>
                <td><?= $kat['nama_kategori'] ?></td>
                <td width="10"><a class="hapus-kategori" href="<?= base_url('Kategori/hapus_kategori/')  ?><?= $kat['id_kategori']; ?>" class="text-hover-red"><span class="fa fa-trash"></span></a></td>
                <td width="10"><a href="<?= base_url('Kategori/edit_barang/')  ?><?= $kat['id_kategori']; ?>"><span class="fa fa-edit"></span></a></td>
              </tr>
            <?php endforeach; ?>

            </tbody>
          </table>
          <!-- <ul class="pagination pagination--blue">
            <li class="pagination__item pagination__item--disabled">
              <a href="#">Previous</a>
            </li>
            <li class="pagination__item"><a href="#">1</a></li>
            <li class="pagination__item pagination__item--active">
              <a href="#">2</a>
            </li>
            <li class="pagination__item"><a href="#">3</a></li>
            <li class="pagination__item">
              <a href="#">Next</a>
            </li>
          </ul> -->
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Kategori/submit_kategori') ?>" method="post">
            <input type="text" name="nama_kategori" placeholder="Nama Kategori" class="form form--focus-blue mt-0">
            <?php echo form_error('nama_kategori','<small class="text-danger pl-3">','</small>'); ?>
    
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
 

