<?php
session_start();
include 'koneksi.php';
$koneksi = new database();
$action = $_GET['action'];

$nik = date("dmy").rand(1,100);
$id_petugas = date("dmy").rand(1,100);


if($action == "regis_masyarakat"){
    $koneksi->register_masyarakat($nik,$_POST['nama'],$_POST['username'],$_POST['password'],$_POST['telp']);
    header('location:login/?page=dashboard');
}
elseif($action == "regis_admin"){
    $koneksi->register_admin($id_petugas,$_POST['nama_petugas'],$_POST['username'],$_POST['password'],$_POST['telp'],$_POST['level']);
    header('location:login/?page=dashboard');
}
elseif($action == "login"){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $login = $koneksi->login($_POST['username'], $_POST['password']);
        if($login){
            if($_SESSION['level'] == "admin"){
                header("location:admin?page=dashboard");
            }
            elseif($_SESSION['level'] == "petugas"){
                header("location:admin?page=dashboard");
            }
            elseif($_SESSION['level'] == "masyarakat"){
                header("location:admin/masyarakat?page=dashboard");
            }
        }
        else{
            $msg = "NIS/USERNAME SALAH";
        }
    }
}
elseif($action == "pengaduan"){
    $ekstensi =  array('png','jpg','jpeg','gif');
    $filename = $_FILES['foto']['name'];

    $id_pengaduan = date("dmy").rand(1,100);
    $tgl_pengaduan = date("d-m-y");
    $nik = $_SESSION['nik'];
    $status = "proses";

    move_uploaded_file($_FILES['foto']['tmp_name'], 'admin/gambar/'.$nik.'_'.$filename);
    $foto = $nik.'_'.$filename;
    
    
    $koneksi->pengaduan($id_pengaduan,$tgl_pengaduan,$nik,$_POST['isi_laporan'],$foto,$status);
    header('location:admin/pengaduan?page=pengaduan');
}
elseif($action == "logout"){
    $logout = $koneksi->logout();
    if ($logout){
        header("location:login/?page=");
    }
}
elseif($action == "tanggapan"){
    $id_petugas = $_SESSION['id_petugas'];
    $id_tanggapan = $id_petugas.rand(1,100);
    $tgl_tanggapan = date("d-m-y");
    
    $hasil = $koneksi->isi_tanggapan($id_tanggapan,$_POST['id_pengaduan'],$tgl_tanggapan,$_POST['tanggapan'],$id_petugas);
    $status = "selesai";
    $hasil .= $koneksi->proses_tanggapan($_POST['id_pengaduan'],$status);
    header('location:admin/tanggapan');
    
}
?>
