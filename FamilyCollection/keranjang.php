<?php
session_start();

echo "<pre>";
print_r($_SESSION['keranjang']);
echo "</pre>";


$koneksi = new mysqli("localhost", "root", "", "olshop");

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('Keranjang kosong, Silahkan Belanja Dulu');</script>";
	echo "<script>lloaction='index.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>


<!-- navbar -->
<nav class="navbar" style="background-color: #6b6b47;>
	<div class="container">

	<ul class="nav navbar-nav">
		<li><a href="index.php" style="color: white">Home</a></li>
		<li><a href="keranjang.php"style="color: white">Keranjang</a></li>
		<li><a href="login.php"style="color: white">Login</a></li>
		<li><a href="checkout.php"style="color: white">Checkout</a></li>
	</ul>
</div>
</nav>


<!-- konten -->
<section class="konten">
	 <div class="container">
	 	<h1>Keranjang Belanja</h1>
	 	<hr>
	 	<table class="table table-bordered">
	 		<thread>
	 			<tr>
	 				<th>No</th>
	 				<th>Produk</th>
	 				<th>Harga</th>
	 				<th>Jumlah</th>
	 				<th>Subharga</th>
	 				<th>Aksi</th>
	 			</tr>
	 		</thread>
	 		<tbody>
	 			<?php $nomor=1; ?>
	 			<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
	 				<!-- menampilkan produk yang sedang diperulangkan berdasarkan id_produk -->
	 				<?php
	 				$ambil = $koneksi->query("SELECT * FROM produk ");
	 				$pecah = $ambil->fetch_assoc();
	 				$subharga = $pecah["harga_produk"]*$jumlah;

	 				?>
	 				<tr>
	 					<td><?php echo $nomor; ?></td>
	 					<td><?php echo $pecah["nama_produk"]; ?></td>
	 					<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
	 					<td><?php echo $jumlah; ?></td>
	 					<td>Rp. <?php echo number_format($subharga); ?></td>
	 					<td>
	 						<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">Hapus</a>
	 				</tr>
	 				<?php $nomor++; ?>
	 			    <?php endforeach ?>
	 			</tbody>
	 		</table>
	 		<a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
	 		<a href="checkout.php" class="btn btn-primary">Checkout</a>

	 	</div>
	 </section>
