<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $_SESSION['username']; ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<?php 
			if($_SESSION['level'] == 'masyarakat'){
			?>
			<li <?php error_reporting(0); if($_GET['page'] == 'dashboard'){ echo "class=active"; }?>><a href="index?page=dashboard"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li <?php error_reporting(0); if($_GET['page'] == 'pengaduan'){ echo "class=active"; }?>><a href="pengaduan?page=pengaduan"><em class="fa fa-file-text">&nbsp;</em> Tanggapan</a></li>
			<?php } 
			elseif($_SESSION['level'] == 'admin'){
			?>
			<li><a href="tanggapan"><em class="fa fa-comments-o">&nbsp;</em> Tanggapan</a></li>
			<li><a href="laporan"><em class="fa fa-file">&nbsp;</em> Generate Laporan</a></li>
			<?php } 
			elseif($_SESSION['level'] == 'petugas'){
			?>
			<li><a href="tanggapan"><em class="fa fa-comments-o">&nbsp;</em> Tanggapan</a></li>
			<?php } ?>
			<li><a href="../proses.php?action=logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>