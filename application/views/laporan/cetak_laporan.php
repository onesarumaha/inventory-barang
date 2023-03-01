<style type="text/css">
  .tabelpdf{
    width: 160px;
    height: 30px;
  }
  td{
    height: 25px;
  }
</style>
<title><?php echo $title; ?></title>
  <center><div>
    <h1>PT. Mitrajaya Karya Mandiri</h1>
    <label style="font-weight: bold;"><?php echo $title; ?></label>
    <br>
    <label><?php echo date('l, d M Y'); ?></label>
  </div></center>
  <hr>
  <br>
  <br>

<table border="1" cellspacing="1">
  <thead>
    <tr class="tabelpdf">
      	<th>No</th>
          <th class="text-center">Tanggal</th>
          <th style="width: 170px" class="text-center">Nama Barang</th>
          <th style="width: 170px" class="text-center">Kategori</th>
          <th style="width: 170px" class="text-center">Jenis</th>
          <th class="text-center">Qty</th>
          <th style="width: 170px" class="text-center">Satuan</th>
          <th style="width: 170px" class="text-center">Keterangan</th>
    </tr>
  </thead>

  <tbody>
    <?php 
    $no = 1;
    foreach($lap_per as $row) : ?>
    <tr>
      	<td style="text-align: center;"><?php echo $no++; ?></td>
            <td style="text-align: center;"><?= date("d M Y", strtotime( $row['tgl_permintaan']))?></td>
            <td style="text-align: center;"><?= $row['nama_barang']; ?></td>
            <td style="text-align: center;"><?= $row['kategori']; ?></td>
            <td style="text-align: center;"><?= $row['jenis_barang']; ?></td>
            <td style="text-align: center;"><?= $row['qty']; ?></td>
            <td style="text-align: center;"><?= $row['satuan']; ?></td>
            <td style="text-align: center;"><?= $row['keterangan']; ?></td>

    </tr>
    <?php endforeach; ?>
    
      </tbody>

    <div class="container">
      <br>

    </div>
    
    
    </table>

