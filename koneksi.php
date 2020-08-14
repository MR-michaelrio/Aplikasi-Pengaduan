<?php 
class database{
    
    var $host = 'localhost';
    var $user = 'root';
    var $pass = '';
    var $database = 'pengaduan';
    var $koneksi = '';

    function __construct(){
        $con = mysqli_connect($this->host,$this->user,$this->pass,$this->database);
        $this->koneksi=$con;
    }
    function register_masyarakat($nik,$nama,$username,$password,$telp){
        mysqli_query($this->koneksi,"INSERT INTO masyarakat VALUES ('$nik','$nama','$username','$password','$telp')"); 
    }
    function register_admin($id_petugas,$nama_petugas,$username,$password,$telp,$level){
        mysqli_query($this->koneksi,"INSERT INTO petugas VALUES ('$id_petugas','$nama_petugas','$username','$password','$telp','$level')");
    }

    function jumlah_user(){
        $result=mysqli_query($this->koneksi,"SELECT COUNT(*) FROM masyarakat");
        while($row = mysqli_fetch_array($result)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function jumlah_aduan(){
        $result=mysqli_query($this->koneksi,"SELECT COUNT(*) FROM pengaduan");
        while($row = mysqli_fetch_array($result)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function jumlah_tanggapan(){
        $result=mysqli_query($this->koneksi,"SELECT COUNT(*) FROM tanggapan");
        while($row = mysqli_fetch_array($result)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function jumlah_petugas(){
        $result=mysqli_query($this->koneksi,"SELECT COUNT(*) FROM petugas");
        while($row = mysqli_fetch_array($result)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function login($username,$password){
        $q = mysqli_query($this->koneksi,"select * from masyarakat where username='$username' and password='$password'");
        $r = mysqli_fetch_array ($q);
    
        $q2 = mysqli_query($this->koneksi,"select * from petugas where username='$username' and password='$password'");
        $row = mysqli_fetch_array ($q2);

        if (mysqli_num_rows($q) == 1) {
            $_SESSION['username'] = $r['username'];
            $_SESSION['password'] = $r['password'];
            $_SESSION['nik'] = $r['nik'];
            $_SESSION['level'] = 'masyarakat';
            return TRUE;
        }
        elseif (mysqli_num_rows($q2) == 1) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['level'] = $row['level'];
            $_SESSION['id_petugas'] = $row['id_petugas'];
            return TRUE;
        }
        elseif (mysqli_num_rows($q2) == 1) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['id_petugas'] = $row['id_petugas'];
            $_SESSION['level'] = $row['level'];
            return TRUE;
        }else {
            return FALSE;
        }
    }

    function pengaduan($id_pengaduan,$tgl_pengaduan,$nik,$isi_laporan,$foto,$status){
        mysqli_query($this->koneksi, "insert into pengaduan values ('$id_pengaduan','$tgl_pengaduan','$nik','$isi_laporan','$foto','$status')");
    }

    function data_pengaduan(){
        $nik = $_SESSION['nik'];
        $result=mysqli_query($this->koneksi,"SELECT * FROM pengaduan WHERE nik=$nik");
        while($row = mysqli_fetch_array($result)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function data_pengaduan1(){
        $result=mysqli_query($this->koneksi,"SELECT * FROM pengaduan");
        while($row = mysqli_fetch_array($result)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function logout(){
        session_destroy();
        return TRUE;
    }

    function isi_tanggapan($id_tanggapan,$id_pengaduan,$tgl_tanggapan,$tanggapan,$id_petugas){
        $a = mysqli_query($this->koneksi,"INSERT INTO tanggapan VALUES ('$id_tanggapan','$id_pengaduan','$tgl_tanggapan','$tanggapan','$id_petugas')");

    }
    function proses_tanggapan($id_pengaduan,$status){
        mysqli_query($this->koneksi,"UPDATE pengaduan set status='$status' where id_pengaduan='$id_pengaduan'");
    }

    function laporan(){
		$data = "SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas";
		$query =  mysqli_query($this->koneksi, $data);
		while($row = mysqli_fetch_array($query)){
			$hasil[] = $row;
		}
		return $hasil;
	}


}
?>
