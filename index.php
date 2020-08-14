<?php
error_reporting(0);
include 'koneksi.php';
$db = new database();
?>
<!DOCTYPE html>
<html>
<head>
    <style>
    .select {
    background-color:#eee;
    width:100%;
    padding:10px;
    border:0px;
    margin:10px;
    }
    </style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link href="css/login.css" rel="stylesheet">
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
	<a href="login/index?page=admin" style="color:red;font-weight:bold; margin:15px; font-size:20px">login<<</a>
		<form action="proses?action=regis_admin" method="post">
			<h1>Create Account</h1>
			<span>UNTUK ADMIN</span>
			<input type="text" name=nama_petugas placeholder="Nama Lengkap" />
			<input type="text" name=username placeholder="username" />
            <input type="text" name=password placeholder="Password" />
			<input type="text" name=telp placeholder="No.Telp" />
			<select name=level class=select>
                <option value=admin>Admin</option>
            </select>
			<button>Sign Up</button>
		</form>
    </div>
	<div class="form-container sign-in-container">
    <a href="login/index?page=masyarakat" style="color:red;font-weight:bold; margin:15px; font-size:20px">login<<</a>
		<form action="proses?action=regis_masyarakat" method="post">
			<h1>Create Account</h1>
			<span>UNTUK MASYARAKAT</span>
			<input type="text" name=nama placeholder="Nama Lengkap" />
			<input type="text" name=username placeholder="username" />
            <input type="text" name=password placeholder="Password" />
            <input type="text" name=telp placeholder="No.Telp" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Hallo, Admin</h1>
				<p>Silahkan Registrasi Akun disini</p>
				<button class="ghost" id="signIn">Sign Up Masyarakat</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hai</h1>
				<p>Selamat Datang diWebsite Kami Silahlkan Registrasi Akun Disini</p>
				<button class="ghost" id="signUp" onclick="petugas()">Sign Up Admin</button>
			</div>
		</div>
	</div>
</div>
<script>
function petugas() {
  var txt;
  var pass = prompt("Please enter password:");
  if (pass == "admin") {
    const signUpButton = document.getElementById("signUp");
    signUpButton.addEventListener("click", () => {
	container.classList.add("right-panel-active");
    });
  }
 
}
</script>
<script>
const signInButton = document.getElementById("signIn");
const container = document.getElementById("container");

signInButton.addEventListener("click", () => {
	container.classList.remove("right-panel-active");
});
</script>
</body>
</html>	
