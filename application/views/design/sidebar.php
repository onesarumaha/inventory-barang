<!-- sidebar -->
  <aside class="sidebar">
    <ul class="sidebar__nav">
      <li class="sidebar__item sidebar__item--active"><a class="nav-link" href="<?= base_url('Dashboard') ?>"><span class="fa fa-home"></span> Dashboard</a></li>

      <?php if($this->session->userdata('level') == 'Staff Gudang') :  ?>
      <li class="sidebar__item"><a class="sidebar__btn-dropdown" href="#"><span class="fa fa-desktop"></span> Master </a>
        <ul class="sidebar__dropdown">
          <li class="sidebar__dropdown-item"><a href="<?= base_url('DataBarang/') ?>">Data Barang</a></li>
           <li class="sidebar__dropdown-item"><a href="<?= base_url('Staff/') ?>">Data Kepala Cabang</a></li>
           <li class="sidebar__dropdown-item"><a href="<?= base_url('Karyawan/') ?>">Data Karyawan</a></li>
           <li class="sidebar__dropdown-item"><a href="<?= base_url('Supplier/') ?>">Data Supplier</a></li>
          
        </ul>
      </li>

      <li class="sidebar__item"><a href="<?= base_url("Permintaan/data_permintaan") ?>"><span class="fa fa-th-list"></span> Permintaan Barang</a></li> 

         <li class="sidebar__item"><a href="<?= base_url("Pengadaan/") ?>"><span class="fa fa-th-list"></span> Pengadaan  Barang</a></li>

         <li class="sidebar__item"><a href="<?= base_url('Produksi/bahan_baku')  ?>"><span class="fa fa-th-list"></span> Bahan Baku</a></li>

      <!-- <li class="sidebar__item"><a class="sidebar__btn-dropdown" href="#"> <span class="fa fa-check-circle"> </span> Approve </a> -->
        <li class="sidebar__item"><a class="sidebar__btn-dropdown" href="#"> <span class="fa fa-check-circle"> </span> Approve </a>
        <ul class="sidebar__dropdown">
          <li class="sidebar__dropdown-item"><a href="<?= base_url('Approve/') ?>">Permintaan Barang</a></li>
          
        </ul>
      </li>

        <ul class="sidebar__dropdown">
          <li class="sidebar__dropdown-item"><a href="<?= base_url('Approve/') ?>">Permintaan Barang</a></li>
          <li class="sidebar__dropdown-item"><a href="<?= base_url('Approve/approve_pengadaan') ?>">Pengadaan Barang</a></li>
        </ul>
      </li>

      <li class="sidebar__item"><a class="sidebar__btn-dropdown" href="#"><span class="fa fa-building"></span> Laporan</a>
        <ul class="sidebar__dropdown">
          <!-- <li class="sidebar__dropdown-item"><a href="<?= base_url('Laporan/permintaan_barang')  ?>">Permintaan Barang</a></li> -->
          <li class="sidebar__dropdown-item"><a href="<?= base_url('Laporan/pengadaan_barang')  ?>">Pengadaaan Barang</a></li>
        </ul>
      </li>
    <?php endif; ?>

          <?php if($this->session->userdata('level') == 'Staff Lapangan'):  ?>


        <li class="sidebar__item"><a href="<?= base_url("Permintaan/") ?>"><span class="fa fa-th-list"></span> Permintaan Barang</a></li>

        <li class="sidebar__item"><a href="<?= base_url("Pesan/") ?>"><span class="fa fa-envelope-open"></span> Pesan</a></li> 


    <?php endif; ?>

    <?php if($this->session->userdata('level') == 'Manager'):  ?>
      

      <li class="sidebar__item"><a class="sidebar__btn-dropdown" href="#"> <span class="fa fa-check-circle"> </span> Approve </a>
        <ul class="sidebar__dropdown">
          <!-- <li class="sidebar__dropdown-item"><a href="<?= base_url('Approve/') ?>">Permintaan Barang</a></li> -->
          <li class="sidebar__dropdown-item"><a href="<?= base_url('Approve/approve_pengadaan') ?>">Pengadaan Barang</a></li>
        </ul>
      </li>


      <li class="sidebar__item"><a class="sidebar__btn-dropdown" href="#"><span class="fa fa-building"></span> Laporan</a>
        <ul class="sidebar__dropdown">
         <!--  <li class="sidebar__dropdown-item"><a href="<?= base_url('Laporan/permintaan_barang')  ?>">Permintaan Barang</a></li> -->
          <li class="sidebar__dropdown-item"><a href="<?= base_url('Laporan/pengadaan_barang')  ?>">Pengadaaan Barang</a></li>
        </ul>
      </li>
    <?php endif; ?>

    <?php if($this->session->userdata('level') == 'Staff Produksi') :  ?>

      <li class="sidebar__item"><a class="sidebar__btn-dropdown" href="#"><span class="fa fa-desktop"></span> Master </a>
        <ul class="sidebar__dropdown">
          <li class="sidebar__dropdown-item"><a href="<?= base_url('DataBarang/') ?>">Data Barang</a></li>
           <!-- <li class="sidebar__dropdown-item"><a href="<?= base_url('Supplier/') ?>">Data Supplier</a></li> -->
          <li class="sidebar__dropdown-item"><a href="<?= base_url('Kategori/') ?>">Kategori</a></li>
          <li class="sidebar__dropdown-item"><a href="<?= base_url('Jenis/') ?>">Jenis</a></li>
          <li class="sidebar__dropdown-item"><a href="<?= base_url('Satuan/') ?>">Satuan</a></li>
        </ul>
      </li>
       
        <li class="sidebar__item"><a href="<?= base_url('Produksi/') ?>"><span class="fa fa-th-list"></span> Data Produksi</a></li>

       

        <li class="sidebar__item"><a class="sidebar__btn-dropdown" href="#"><span class="fa fa-building"></span> Data Pengadaan</a>
        <ul class="sidebar__dropdown">
          <li class="sidebar__dropdown-item"><a href="<?= base_url('Produksi/pengadaan_produksi') ?>">Pengadaan Barang</a></li>
          <!-- <li class="sidebar__dropdown-item"><a href="<?= base_url('Produksi/bahan_baku')  ?>"> Bahan Baku</a></li> -->
        </ul>
      </li>



      <li class="sidebar__item"><a class="sidebar__btn-dropdown" href="#"><span class="fa fa-building"></span> Laporan</a>
        <ul class="sidebar__dropdown">
          <!-- <li class="sidebar__dropdown-item"><a href="<?= base_url('Laporan/permintaan_barang')  ?>">Permintaan Barang</a></li> -->
          <li class="sidebar__dropdown-item"><a href="<?= base_url('Laporan/pengadaan_barang')  ?>">Pengadaaan Barang</a></li>
        </ul>
      </li>
    <?php endif; ?>

    <?php if($this->session->userdata('level') == 'Supplier') :  ?>
       

        <li class="sidebar__item"><a class="sidebar__btn-dropdown" href="#"><span class="fa fa-th-list"></span> Data Pemesanan </a>
        <ul class="sidebar__dropdown">
          <li class="sidebar__dropdown-item"><a href="<?= base_url("Supplier/pemesanan_barang") ?>">Orderan </a></li>
           <li class="sidebar__dropdown-item"><a href="<?= base_url('Supplier/pemesanan_selesai') ?>">Orderan Selesai</a></li>

        </ul>
      </li>

    <?php endif; ?>

      <li class="sidebar__item"><a id="keluarkan" href="<?= base_url('log/logout') ?>"><span class="fa fa-sign-out"></span> Logout</a></li>


    </ul>
  </aside>