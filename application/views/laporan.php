<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laporan BEM-VOTE</title>
    <style media="screen">
    *{
      padding: 0;
      margin: 0;
    }
    table td, table th{
      border: 2px solid black;
      padding: 5px;
      text-align: center;
    }
    body{
      height: 100vh;
      width: 1000px;
      margin: 0 auto;
    }
    .container{
      font-family: sans-serif;
      color: black;
      text-align: center;
      word-wrap: break-word;
      padding: 10px;
    }
    table{
      width:750px;
      margin: 0 auto;
    }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Laporan E-VOTE</h1>
      <br><br><br>
      <h2>Laporan Calon RW</h2>
      <br>
      <h3>Data Calon RW</h3>
      <table style="width:750px;
      margin: 0 auto;">
        <tr>
          <th>Nama Koalisi</th>
          <th>Nama Paslon</th>
          <th>Nomor Urut</th>
        </tr>
        <?php foreach($paslons as $paslon): ?>
        <tr>
          <td><?= $paslon->nama_koalisi ?></td>
          <td><?= $paslon->nama_paslon ?></td>
          <td><?= $paslon->nomor_urut ?></td>
        </tr>
      <?php endforeach ?>
      </table>
      <br><br>

      <h4>Live Count</h4>
      <table style="width:750px;
      margin: 0 auto;">
        <tr>
          <th>Nama Paslon</th>
          <th>Presentasi suara (%)</th>
          <th>Jumlah suara (Orang)</th>
        </tr>
        <tr>
          <td><?= $paslonSatu->nama_paslon ?></td>
          <td><?= $totalSuaraMasukSatuStat ?></td>
          <td><?= $totalSuaraMasukSatu ?></td>
        </tr>
        <tr>
          <td><?= $paslonDua->nama_paslon ?></td>
          <td><?= $totalSuaraMasukDuaStat ?></td>
          <td><?= $totalSuaraMasukDua ?></td>
        </tr>
      </table>

      <br><br>
      <h4>Statistik Pemilihan</h4>
      <table style="width:750px;
      margin: 0 auto;">
        <tr>
          <th>Total Suara Masuk (Orang)</th>
          <th>Total Pemilih (Orang)</th>
          <th>Total Tidak Memilih (Orang)</th>
          <th>Presentasi Pemilih (%)</th>
        </tr>
        <tr>
          <td><?= $totalSuaraMasuk ?></td>
          <td><?= $totalPemilih ?></td>
          <td><?= $totalTidakMemilih ?></td>
          <td><?= $totalSuaraMasukStat ?></td>
        </tr>
      </table>

      <br><br>
      <h4>Statistik Pemilih Tiap Fakultas</h4>
      <table style="width:750px;
      margin: 0 auto;">
        <tr>
          <th>RT</th>
          <th>Total Pemilih (Orang)</th>
          <th>Total Suara Masuk (Orang)</th>
          <th>Total Tidak Memilih (Orang)</th>
          <th>Presentasi Suara Masuk (%)</th>
        </tr>
		<tr>
          <td>RT 01</td>
          <td><?= $totalPemilihFOK ?></td>
          <td><?= $totalSuaraMasukFOK ?></td>
          <td><?= $totalTidakMemilihFOK ?></td>
          <td><?= $totalSuaraMasukFOKStat ?></td>
        </tr>
		     <tr>
          <td>RT 02</td>
          <td><?= $totalPemilihFIS ?></td>
          <td><?= $totalSuaraMasukFIS ?></td>
          <td><?= $totalTidakMemilihFIS ?></td>
          <td><?= $totalSuaraMasukFISStat ?></td>
        </tr>
        <tr>
          <td>RT 03</td>
          <td><?= $totalPemilihFIK ?></td>
          <td><?= $totalSuaraMasukFIK ?></td>
          <td><?= $totalTidakMemilihFIK ?></td>
          <td><?= $totalSuaraMasukFIKStat ?></td>
        </tr>
       <tr>
          <td>RT 04</td>
          <td><?= $totalPemilihFaperta ?></td>
          <td><?= $totalSuaraMasukFaperta ?></td>
          <td><?= $totalTidakMemilihFaperta ?></td>
          <td><?= $totalSuaraMasukFapertaStat ?></td>
        </tr>
     
           <tr>
          <td>RT 05</td>
          <td><?= $totalPemilihHukum ?></td>
          <td><?= $totalSuaraMasukHukum ?></td>
          <td><?= $totalTidakMemilihHukum ?></td>
          <td><?= $totalSuaraMasukHukumStat ?></td>
        </tr>
    
        <tr>
          <td>RT 06</td>
          <td><?= $totalPemilihFSB ?></td>
          <td><?= $totalSuaraMasukFSB ?></td>
          <td><?= $totalTidakMemilihFSB ?></td>
          <td><?= $totalSuaraMasukFSBStat ?></td>
        </tr>
     
      
       
      </table>
    </div>
  </body>
</html>
