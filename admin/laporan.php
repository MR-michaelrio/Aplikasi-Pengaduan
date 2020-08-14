<?php
session_start();
include '../koneksi.php';
$koneksi = new database();
$data = $koneksi->laporan();
?>
<table width=100% border=1 style="border-collapse: collapse;">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Id Tanggapan</th>
<th scope="col">Id Pengaduan</th>
<th scope="col">Tanggal Tanggapan</th>
<th scope="col">Tanggal Pengaduan</th>
<th scope="col">Pengaduan</th>
<th scope="col">Tanggapan</th>
<th scope="col">Id Petugas</th>
<th scope="col">Nama Petugas</th>
<th scope="col">Status</th>
</tr>
</thead>
<?php 
$i=1;
foreach($data as $a){ ?>
<tbody>
<tr>
<td scope="row"><?php echo $i++ ?></td>
<td><?php echo $a['id_tanggapan']; ?></td>
<td><?php echo $a['id_pengaduan']; ?></td>
<td><?php echo $a['tgl_tanggapan']; ?></td>
<td><?php echo $a['tgl_pengaduan']; ?></td>
<td><?php echo $a['isi_laporan']; ?></td>
<td><?php echo $a['tanggapan']; ?></td>
<td><?php echo $a['id_petugas']; ?></td>
<td><?php echo $a['nama_petugas']; ?></td>
<td><?php echo $a['status']; ?></td>
</tr>
</tbody>
<?php } ?>
</table>
<script>
window.print();
</script>