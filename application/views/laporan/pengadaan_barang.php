<div class="notif-data" data-notifdata="<?= $this->session->flashdata('notif'); ?>"></div>

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
          
        <form action="<?= base_url('Laporan/cetak_periode_pengadaan') ?>" method="POST" target="_blank">
              <div class="card-body">
                  <div class="form-group row">
                    <div class="col">
                      <label>Dari Tanggal : </label>
                      <div>
                        <input max="<?= date('Y-m-d') ?>" class="form form--focus-blue mt-1" type="date" id="tgl_1" name="tgl_1">
                      </div>
                    </div>
                    <div class="col">
                      <label>Sampai Tanggal :</label>
                      <div>
                        <input max="<?= date('Y-m-d') ?>" class="form form--focus-blue mt-1" type="date" id="tgl_2" name="tgl_2">
                      </div>
                    </div>
                    
                  </div><br>
                   <button type="submit" name="periode" class="btn btn--blue btn-sm">Cetak Periode</button>
                    <a href="<?= base_url("Laporan/cetak_laporan_pengadaan") ?>" class="btn btn--green btn-sm" target="_blank">Cetak Full</a>
                </div>
			</form>
         
          <table class="table table--blue mb-3">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal </th>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Keterangan </th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach($lap_peng as $minta) : ?>
              <tr>
               <td><?= $no++ ?></td>
                <td><?= $minta['tgl_pengadaan'] ?></td>
                <td><?= $minta['nama_barang'] ?></td>
                <td><?= $minta['jumlah'] ?></td>
                <td><?= $minta['ket_pengadaan'] ?></td>

               
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

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('DataBarang/submit_barang') ?>" method="post">
            <input type="text" name="nama_barang" placeholder="Nama Barang" class="form form--focus-blue mt-0">
            <?php echo form_error('nama_barang','<small class="text-danger pl-3">','</small>'); ?>
    
            <select name="kategori" class="form form--focus-blue ">
              <option selected="">-- Pilih Kategori --</option>
              <?php foreach($kategori as $kat ) : ?>
              <option value="<?= $kat['nama_kategori'] ?>"><?= $kat['nama_kategori'] ?></option>
              <?php endforeach; ?>
              <?php echo form_error('kategori','<small class="text-danger pl-3">','</small>'); ?>
            </select>

             <select name="jenis_barang" class="form form--focus-blue">
              <option selected="">-- Pilih Jenis --</option>
              <?php foreach($jenis as $jns) : ?>
              <option value="<?= $jns['nama_jenis'] ?>"><?= $jns['nama_jenis'] ?></option>
              <?php endforeach; ?>
              <?php echo form_error('jenis_barang','<small class="text-danger pl-3">','</small>'); ?>
            </select>

             <input type="number" name="stok" placeholder="Stok Barang" class="form form--focus-blue">
             <?php echo form_error('stok','<small class="text-danger pl-3">','</small>'); ?>

             <select name="satuan" class="form form--focus-blue">
              <option selected="">-- Pilih Satuan --</option>
              <?php foreach($satuan as $sat ) : ?>
              <option value="<?= $sat['nama_satuan'] ?>"><?= $sat['nama_satuan'] ?></option>
            <?php endforeach; ?>
              <?php echo form_error('satuan','<small class="text-danger pl-3">','</small>'); ?>
            </select>

            <textarea name="ket" class="form form--focus-blue" placeholder="Keterangan"></textarea>
            <?php echo form_error('ket','<small class="text-danger pl-3">','</small>'); ?>
          
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

 

