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
    <h1><?php echo $title; ?></h1>
    <label><i></i></label><br>
    <label>PT. Mitrajaya Karya Mandiri</label><br>
    <label><?php echo date('l, d M Y'); ?></label>
  </div></center>

<center>
<table border="1" cellspacing="0">
  <thead>
    <tr>
      	<th>No</th>
          <th style="width: 160px" class="text-center">Tanggal</th>
          <th style="width: 300px" class="text-center">Nama Barang</th>
          <th style="width: 170px" class="text-center">Qty</th>
          <th style="width: 350px" class="text-center">Katerangan</th>
    </tr>
  </thead>

  <tbody>
    <?php 
    $no = 1;
    foreach($lap_per as $row) : ?>
    <tr>
      	<td style="text-align: center;"><?php echo $no++; ?></td>
            <td style="text-align: center;"><?= date("d M Y", strtotime( $row['tgl_pengadaan']))?></td>
            <td style="text-align: center;"><?= $row['nama_barang']; ?></td>
            <td style="text-align: center;"><?= $row['jumlah']; ?></td>
            <td style="text-align: center;"><?= $row['ket_pengadaan']; ?></td>


    </tr>
    <?php endforeach; ?>
    
      </tbody>

    <div class="container">
      <br>

    </div>
    
    
    </table>
</center>
    <script type="text/javascript">
      window.print();
    </script>

