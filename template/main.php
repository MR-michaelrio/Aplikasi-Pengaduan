<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<?php
		if($_SESSION['level'] != "masyarakat"){
		?>
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
							<div class="large"><?php 
							$tampil = $koneksi->jumlah_user();
							foreach($tampil as $x){
								echo $x['COUNT(*)'];
							}
							?></div>
							<div class="text-muted">Masyarakat</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<div class="large"><?php 
							$tampil = $koneksi->jumlah_aduan();
							foreach($tampil as $x){
								echo $x['COUNT(*)'];
							}
							?></div>
							<div class="text-muted">Pengaduan</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-teal"></em>
							<div class="large"><?php 
							$tampil = $koneksi->jumlah_tanggapan();
							foreach($tampil as $x){
								echo $x['COUNT(*)'];
							}
							?></div>
							<div class="text-muted">Tanggapan</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-user color-red"></em>
							<div class="large"><?php 
							$tampil = $koneksi->jumlah_petugas();
							foreach($tampil as $x){
								echo $x['COUNT(*)'];
							}
							?></div>
							<div class="text-muted">Jumlah Petugas</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		<?php } 
		else{
		?>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Form Pengaduan</div>
					<div class="panel-body">
						<div class="col-md-12">
							<form action="../proses?action=pengaduan" method=POST enctype="multipart/form-data">
								<div class="form-group">
									<label>Laporan Pengaduan</label>
									<textarea class="form-control" rows="3" name="isi_laporan"></textarea>
								</div>
								<div class="form-group">
									<label>Foto</label>
									<input type="file" name="foto">
								</div>
									<button type="submit" class="btn btn-primary">Submit Button</button>
								</div>
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div>
		<?php } ?>
		</div>
		
	</div>