  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?= $title ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard/') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active"><?= $title ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

           <div class="card">
            <div class="card-body">
              <!-- <h5 class="card-title">Table with hoverable rows</h5> -->
               <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#basicModal">Input Stok</button>

              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Age</th>
                    <th scope="col">Start Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Brandon Jacob</td>
                    <td>Designer</td>
                    <td>28</td>
                    <td>2016-05-25</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Bridie Kessler</td>
                    <td>Developer</td>
                    <td>35</td>
                    <td>2014-12-05</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Ashleigh Langosh</td>
                    <td>Finance</td>
                    <td>45</td>
                    <td>2011-08-12</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Angus Grady</td>
                    <td>HR</td>
                    <td>34</td>
                    <td>2012-06-11</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Raheem Lehner</td>
                    <td>Dynamic Division Officer</td>
                    <td>47</td>
                    <td>2011-04-19</td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->

            </div>
          </div>



          </div>
        </div><!-- End Left side columns -->



        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Input Stok</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <form action="<?= base_url('DataBarang/submit_stok') ?>" method="POST" class="row g-3">
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Nama Barang </label>
              <input type="text" class="form-control" id="inputNanme4" name="nama_barang">
              <?php echo form_error('nama_barang','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Kategori</label>
              <input type="text" class="form-control" id="inputEmail4" name="kategori">
              <?php echo form_error('kategori','<small class="text-danger pl-3">','</small>'); ?>
            </div>
           <div class="col-12">
              <label for="inputstok" class="form-label">Stok</label>
              <input type="number" class="form-control" id="inputstok" name="stok">
              <?php echo form_error('stok','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="col-12">
              <label for="inputharga" class="form-label">Harga</label>
              <input type="number" class="form-control" id="inputharga" name="harga">
              <?php echo form_error('harga','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="col-12">
              <label for="inputjenis" class="form-label">Jenis</label>
              <input type="text" class="form-control" id="inputjenis" name="jenis">
              <?php echo form_error('jenis','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="col-12">
              <label for="inputket" class="form-label">Keterangan</label>
              <textarea class="form-control" name="ket"></textarea>
              <?php echo form_error('ket','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
           
          </form>
        </div>
        
      </div>
    </div>
  </div>

 