
  <!-- main -->
  <main class="main main--ml-sidebar-width">
    <div class="row">
      <header class="main__header col-md-12 mb-2">
        <div class="main__title">
          <h4>Dashboard</h4>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ul>
        </div>        
      </header>

      <!-- info box -->
      <div class="mb-3 col-md-6 col-lg-4">
        <section class="info-box info-box--blue">
          <div class="info-box__icon"><span class="fa fa-shopping-cart"></span></div>
          <div class="info-box__description">
            <h2> Stok</h2>
            <h1><?= number_format($barangb);  ?></h1>
            <time><?= date('H:i:s'); ?> Wib</time>
            
          </div>
          <a title="Detail Products" class="info-box__btn-detail" href=""><span class="fa fa-arrow-right"></span></a>
        </section>
      </div>
      <div class="mb-3 col-md-6 col-lg-4">
        <section class="info-box info-box--green">
          <div class="info-box__icon"><span class="fa fa-users"></span></div>
          <div class="info-box__description">
            <h2> Supplier</h2>
            <h1><?= $supplier ?></h1>
            <time><?= date('H:i:s'); ?> Wib</time>
          </div>
          <a title="Detail Members" class="info-box__btn-detail" href=""><span class="fa fa-arrow-right"></span></a>
        </section>
      </div>
      <div class="mb-3 col-md-6 col-lg-4">
        <section class="info-box info-box--orange">
          <div class="info-box__icon"><span class="fa fa-shopping-bag"></span></div>
          <div class="info-box__description">
            <h2>Karyawan </h2>
             <h1><?= $karyawan ?></h1>
            <time><?= date('H:i:s'); ?> Wib</time>
          </div>
          <a title="Detail Orders" class="info-box__btn-detail" href=""><span class="fa fa-arrow-right"></span></a>
        </section>
      </div>



    </div><!-- row -->
      <?php if($this->session->userdata('level') == 'Staff Gudang') :  ?>

    <?php 
      foreach($barang as $brg ) :   ?>
      

           <div class="col-md-12 mb-3">
              <div class="alert alert--warning">
                <div class="alert__icon">
                  <span class="fa fa-warning"></span>
                </div>
                <div class="alert__description">
                  <b>Nama Barang : </b> <?= $brg['nama_barang'] ?> | <b>Qty </b> <?= $brg['stok'] ?> = <b>Barang Hampir Habis ! </b>
                </div>
                <div class="alert__action">
                  <a class="alert__close-btn">&times;</a>
                </div>
              </div><!-- alert -->
            </div>



    <?php endforeach; ?>
  <?php endif; ?>  

      


  </main>

