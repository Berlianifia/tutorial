<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","olshop");
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
  background-color: coral;
}
</style>
	<title style="background-color:#6b6b47;">Login Pelanggan</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>



<!-- navbar -->
<nav class="navbar" style="background-color: #6b6b47;>
	<div class="container">
	<ul class="nav navbar-nav">
		<li><a style="color:white" href="index.php">Home</a></li>
		<li><a style="color:white" href="keranjang.php">Keranjang</a></li>
		<!-- jika sudah login(ada session pelanggan)-->
		<?php if (isset($_SESSION["pelanggan"])): ?>
		<li><a style="color:white" href="logout.php">Logout</a>
		<!-- selain itu(belum login || belum ada session pelanggan)-->
		<?php else: ?>
		<li><a style="color:white" href="login.php">Login</a></li>
	<?php endif ?>
		<li><a style="color:white" href="checkout.php">Checkout</a></li>
	</ul>
</div>
</nav>
	 <div class="container">
	 	<div class="row">
	 		<div class="col-md-4">
	 			<div class="panel panel-default">
	 				<div class="panel-heading">
	 					<p class="text-center"</p>
	 					<b class="panel-title">Login Pelanggan</b>
	 				</div>
	 				<div class="panel-body">
	 					<form method="post">
	 						<div class="form-group">
	 							<label>Email</label>
	 							<input type="email" class="form-control" name="email">
	 						</div>
	 						<div class="form-group">
	 							<label>Password</label>
	 							<input type="password" class="form-control" name="password">
	 						</div>
	 						<button class="btn btn-primary"  name="login">Login</button>
	 					</form>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	 	<?php
	 	//jika ada tombol login(tombol login ditekan)
	 	if (isset($_POST["login"]))
	 	{
	 		$email = $_POST["email"];
	 		$password = $_POST["password"];
	 		//lakukan query ngecek akun di tabel pelanggan di database
	 		$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
	 		//menghitung akun yang terambil
	 		$akuyangcocok = $ambil->num_rows;

	 		//jika 1 akun yang cocok, maka boleh diloginkan
	 		if ($akuyangcocok==1)
	 		{
	 			//anda sukses login
	 			//mendapatkan akun dalam bentuk array
	 			$akun = $ambil->fetch_assoc();
	 			//simpan di session pelanggan
	 			$_SESSION["pelanggan"] = $akun;
	 			echo "<script>alert('Anda Sukses Login, Periksa Akun Anda');</script>";
	 			echo "<script>location='checkout.php';</script>";
	 		}
	 		else
	 		{
	 			//anda gagal login
	 			echo "<script>alert('Anda Gagal Login, Periksa Akun Anda');</script>";
	 			echo "<script>location='login.php';</script>";
	 		}
	 	}
	 	?>
	 </body>
	 </html>




