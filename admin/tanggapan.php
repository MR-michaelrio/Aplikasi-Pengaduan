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
				<li class="active">Pengaduan</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pengaduan</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Data Aduan</div>
					<div class="panel-body">
						<div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Id Pengaduan</th>
                                    <th scope="col">Tanggal Pengaduan</th>
                                    <th scope="col">Laporan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                $i=1;
                                $tampil = $koneksi->data_pengaduan1();
                                foreach($tampil as $a){
                                ?>
                                <tbody>
                                    <tr>
                                    <th scope="row"><?php echo $i++ ?></th>
                                    <td><?php echo $a['id_pengaduan']; ?></td>
                                    <td><?php echo $a['tgl_pengaduan']; ?></td>
                                    <td><?php echo $a['isi_laporan']; ?></td>
                                    <td><?php echo $a['status']; ?></td>
                                    <td><img src="gambar/<?php echo $a['foto']; ?>" style="width:50px;height:70px;"></td>
                                    <td><a href="isi_tanggapan?id_pengaduan=<?php echo htmlentities($a['id_pengaduan']); ?>" ><i class="fa fa-pencil" style="font-size: 24px;" aria-hidden="true"></i></a></td>
                                    </tr>
                                </tbody>
                                <?php } ?>
                            </table>
						</div>
					</div>
				</div><!-- /.panel-->
			</div>
		</div>
		
	</div>