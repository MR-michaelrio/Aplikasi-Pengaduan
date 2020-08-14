<?php
session_start();
include '../koneksi.php';
$koneksi = new database();
include "../template/template.php";
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Tanggapan</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tanggapan</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Tanggapan</div>
					<div class="panel-body">
						<div class="col-md-12">
                            <form action="../proses?action=tanggapan" method=POST enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>ID PENGADUAN</label>
                                    <input type=text class="form-control" value="<?php echo $_GET['id_pengaduan']; ?>" disabled>
                                    <input type=hidden class="form-control" value="<?php echo $_GET['id_pengaduan']; ?>" name=id_pengaduan>
                                </div>
                                <div class="form-group">
                                    <label>Tanggapan</label>
                                    <textarea class="form-control" rows="3" name="tanggapan"></textarea>
                                </div>
                                    <button type="submit" class="btn btn-primary">Submit Button</button>
                                </div>
                            </form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div>
		</div>
		
	</div>