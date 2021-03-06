<!-- BEM-VOTE -->
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">RT</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">RT</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Fakultas
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body timeline-container">
            <h5>Jumlah Data : <strong><?= $totalFakultas ?></strong></h5>
						<table class="table">
							<tr>
								<th>No</th>
								<th>RT</th>
								<th>Action</th>
							</tr>
              <?php
                $i = 1;
                foreach($fakultas as $fakultas):
              ?>
							<tr>
								<td><?= $i++ ?></td>
								<td class="fakultas"><?= $fakultas->nama_fakultas ?></td>
								<td>
									<a href="<?= base_url('fakultas/edit/'.$fakultas->id_fakultas) ?>" class="btn btn-warning pull-left" style="color:white;">Edit</a>
                  <?= form_open('fakultas/delete') ?>
                    <input type="hidden" name="id_fakultas" value="<?= $fakultas->id_fakultas ?>">
                    <input type="submit" value="Hapus" class="btn btn-danger pull-left" style="color:white;">
                  <?= form_close() ?>
								</td>
							</tr>
            <?php endforeach ?>
						</table>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						Tambah RT
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
            <?= form_open('fakultas/post', ['class' => 'form-horizontal']) ?>
              <?= validation_errors() ?>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">RT</label>
									<div class="col-md-9">
                    <?= form_input('nama_fakultas', $input->fakultas, ['class' => 'form-control', 'placeholder' => 'RT 00']) ?>
									</div>
								</div>
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
                      <?= form_submit(null, 'Tambah', ['class' => 'btn btn-default btn-md pull-right']) ?>
									</div>
								</div>
            <?= form_close() ?>
					</div>
				</div>
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
