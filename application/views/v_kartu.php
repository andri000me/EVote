
<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('data-print');
       var popupWin = window.open('', '', 'width=900,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
</head>
 
<body style="font-family:Arial">
 
<div class="navbar navbar-static-top">
    <div class="navbar-inner">
        <div class="container">
        </div>
    </div>
</div>
 
<div class="container" style="width:100%">
    <div class="row">
 
        <h3>
            <button id="cetak" onclick="PrintDiv();" class="btn btn-default">Cetak</button>
        </h3>
         
        <div id="data-print" style="width:100%;">
         
        <!-- tampilkan ketika dalam mode print -->
        <div style="width:900px; float:left;  position:relative;">
		
         <?php foreach ($pemilih as $kartu) { ?>
			<div style="width:420px; float:left;  margin-right:20px;">
				<div class="header">	
					<center><h2><img src="<?= base_url()?>assets/img/desa.png" width="60px"> <span style="text-align:center">Your Account System</span></h2>
					<p style="font-size:11px; margin-top:-20px;">Desa Telukpinang Kecamatan Ciawi Kabupaten Bogor Jawa Barat - 16720 Indonesia</p></center>
					<hr>
				</div>
				
				<div class="isi">
					<table width="100%" style="font-weight:bold; font-size:14px;">
						<tr>
							<td>NIK</td>
							<td>:</td>
							<td><?= $kartu->nim_pemilih?></td>
						</tr>
						<tr>
							<td>NAMA PEMILIH</td>
							<td>:</td>
							<td><?= $kartu->nama_pemilih?></td>
						</tr>
						<tr>
							<td>RT</td>
							<td>:</td>
							<td><?= $kartu->nama_fakultas?></td>
						</tr>
						<tr>
							<td>Status Pemilih</td>
							<td>:</td>
							<td><?php if($kartu->nim_pemilih == 'ya'){
								echo "Tetap";
							}else{
								echo "Domisili";
							};?></td>
						</tr>
					</table>
				</div>
				<hr>
				<div class="footer">
					<table width="100%" style="border-bottom-style:dotted; border-bottom-width:4px; border-right-width:10px;">
						<tr>
						
							<td><i style="text-decoration:underline">Info Penting :</i> <p style="font-size:12px;">- Gunakan QR Code untuk login ke sistem pemilihan online
																			.<br>- Dekatkan QR Code ke scanner, ketika Anda Akan Login <br> - Silahkan 
																				Untuk Memilih Calon.</td>
							<td><img src="<?php echo site_url('assets/qrcode/'.$kartu->token_pemilih.'.png')?>" width="130"  /></td>
						</tr>
					</table>
				</div>
			
			</div>	
			
         <?php } ?>
			</div>
		 <br>
        </div>
    </div>
</div>
 
</body>
</html>