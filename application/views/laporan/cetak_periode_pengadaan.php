<?php
    $dt1 = $_POST["tgl_1"];
    $dt2 = $_POST["tgl_2"];
?>

<?php
$koneksi = new mysqli("localhost","root","","skripsi7a");
  $sql = $koneksi->query("SELECT * FROM pengadaan_barang WHERE tgl_pengadaan BETWEEN '$dt1' AND '$dt2' ");
  
  // $koneksi = new mysqli("localhost","root","","skripsi6");
  // $sql = $koneksi->query("SELECT * FROM form_pertanyaan WHERE tgl BETWEEN '$dt1' AND '$dt2' ");
 

?>


   <title>Laporan Periode</title>
<body>
<center>
<h1>Laporan Pengadaan Barang</h1>
<label>PT. Mitrajaya Karya Mandiri</label> <br>
<label> Periode : <?php $a=$dt1; echo date("d-M-Y", strtotime($a))?> s/d <?php $b=$dt2; echo date("d-M-Y", strtotime($b))?> </label>

  <table border="1" cellspacing="0">
    <thead>
      <tr>
          <th>No</th>
          <th class="text-center" style="width: 120px">Tanggal</th>
          <th style="width: 300px" class="text-center">Nama Barang</th>
          <th style="width: 170px" class="text-center">Qty</th>
          <th style="width: 170px" class="text-center">Satuan</th>
          <th style="width: 200px" class="text-center">Keterangan</th>
      </tr>
    </thead>
    <tbody>
        <?php

        if(isset($_POST["periode"])){
           
            $sql_tampil = "SELECT * FROM pengadaan_barang
            JOIN data_barang ON data_barang.id_barang = pengadaan_barang.id_barang
            WHERE tgl_pengadaan BETWEEN '$dt1' AND '$dt2' 
            ORDER BY tgl_pengadaan ASC";
            }
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
         <tr>
            <td style="text-align: center;"><?php echo $no++; ?></td>
            <td style="text-align: center;"><?= date("d M Y", strtotime( $data['tgl_pengadaan']))?></td>
            <td style="text-align: center;"><?= $data['nama_barang']; ?></td>
            <td style="text-align: center;"><?= $data['jumlah']; ?></td>
            <td style="text-align: center;"><?= $data['satuan']; ?></td>
            <td style="text-align: center;"><?= $data['ket_pengadaan']; ?></td>

        </tr>
        <?php
            $no++;
            }
        ?>
    </tbody>

  </table>
</center>
 <script type="text/javascript">
      window.print();
    </script>