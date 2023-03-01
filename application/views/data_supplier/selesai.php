


<div class="notif-supplierpemesanan" data-notifsupplierpemesanan="<?= $this->session->flashdata('notif'); ?>"></div>


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
          
          <table class="table table--blue mb-3">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Nama Barang </th>
                <th>Qty </th>
                <th>Satuan </th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach($pemesanan as $sup) : ?>
              <tr>
               <td><?= $no++ ?></td>
                <td>Mitrajaya Karya Mandiri</td>
                <td><?= $sup['nama_barang'] ?></td>
                <td><?= $sup['qty'] ?></td>
                <td><?= $sup['sat'] ?></td>
                
               
               
              </tr>





            <?php endforeach; ?>

            </tbody>
          </table>
          <?php if(empty($pemesanan) ) : ?>
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

  <?php $this->session->unmark_flash('notif'); ?>
  
 

