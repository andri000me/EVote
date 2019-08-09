<!-- BEM-VOTE -->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Statistik Pemilih</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Statistik Pemilih</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<h3 style="margin-left:25px">Statistik Pemilih Tiap RT</h3>
			
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>RT 01</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?= $totalSuaraMasukFOKStat ?>" ><span class="percent"><?= $totalSuaraMasukFOKStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukFOK ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihFOK ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihFOK ?></strong></h5>
					</div>
				</div>
			</div>
			
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>RT 02</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?= $totalSuaraMasukFISStat ?>" ><span class="percent"><?= $totalSuaraMasukFISStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukFIS ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihFIS ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihFIS ?></strong></h5>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>RT 03</h4>
						<div class="easypiechart" id="easypiechart-tur" data-percent="<?= $totalSuaraMasukFIKStat ?>" ><span class="percent"><?= $totalSuaraMasukFIKStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukFIK ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihFIK ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihFIK ?></strong></h5>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>RT 04</h4>
						<div class="easypiechart" id="easypiechart-yellow" data-percent="<?= $totalSuaraMasukFapertaStat ?>" ><span class="percent"><?= $totalSuaraMasukFapertaStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukFaperta ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihFaperta ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihFaperta ?></strong></h5>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>RT 05</h4>
						<div class="easypiechart" id="easypiechart-green" data-percent="<?= $totalSuaraMasukHukumStat ?>" ><span class="percent"><?= $totalSuaraMasukHukumStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukHukum ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihHukum ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihHukum ?></strong></h5>
					</div>
				</div>
			</div>
			
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>RT 06</h4>
						<div class="easypiechart" id="easypiechart-navy" data-percent="<?= $totalSuaraMasukFSBStat ?>" ><span class="percent"><?= $totalSuaraMasukFSBStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukFSB ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihFSB ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihFSB ?></strong></h5>
					</div>
				</div>
			</div>
			
			
		</div><!--/.row-->

	</div>	<!--/.main-->
