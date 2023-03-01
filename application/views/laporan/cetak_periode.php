<?php
    $dt1 = $_POST["tgl_1"];
    $dt2 = $_POST["tgl_2"];
?>

<?php
$koneksi = new mysqli("localhost","root","","skripsi7a");
  $sql = $koneksi->query("SELECT * FROM permintaan_barang WHERE tgl_permintaan BETWEEN '$dt1' AND '$dt2' ");
  
  // $koneksi = new mysqli("localhost","root","","skripsi6");
  // $sql = $koneksi->query("SELECT * FROM form_pertanyaan WHERE tgl BETWEEN '$dt1' AND '$dt2' ");
 

?>

   <title>Laporan Periode</title>
<body>
<center>
<center><div>
    <h1>PT. Mitrajaya Karya Mandiri</h1>
    <label style="font-weight: bold;">Laporan Permintaan Barang</label>
    <br>
    <label> Periode : <?php $a=$dt1; echo date("d-M-Y", strtotime($a))?> s/d <?php $b=$dt2; echo date("d-M-Y", strtotime($b))?> </label>
  </div></center>

<hr style="margin: 20px;">
  <table border="1" cellspacing="0">
    <thead>
      <tr>
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

        if(isset($_POST["periode"])){
           
            $sql_tampil = "SELECT * FROM permintaan_barang
            JOIN data_barang ON data_barang.id_barang = permintaan_barang.id_barang
            JOIN users ON users.id_user = permintaan_barang.id_user
            WHERE tgl_permintaan BETWEEN '$dt1' AND '$dt2' AND status = 'Diterima'
            ORDER BY tgl_permintaan ASC";
            }
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
         <tr>
            <td style="text-align: center;"><?php echo $no++; ?></td>
            <td style="text-align: center;"><?= date("d M Y", strtotime( $data['tgl_permintaan']))?></td>
            <td style="text-align: center;"><?= $data['nama_barang']; ?></td>
            <td style="text-align: center;"><?= $data['kategori']; ?></td>
            <td style="text-align: center;"><?= $data['jenis_barang']; ?></td>
            <td style="text-align: center;"><?= $data['qty']; ?></td>
            <td style="text-align: center;"><?= $data['satuan']; ?></td>
            <td style="text-align: center;"><?= $data['keterangan']; ?></td>
        </tr>
        <?php
            $no++;
            }
        ?>
    </tbody>

  </table>
</center>
