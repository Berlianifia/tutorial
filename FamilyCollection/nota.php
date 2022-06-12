<?php
//koneksi ke database
$koneksi = new mysqli("localhost","root","","olshop");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nota Pembelian</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>


<!-- navbar -->
<nav class="navbar navbar default">
	<div class="container">
	<ul class="nav navbar-nav">
		<li><a href="index.php">Home</a></li>
		<li><a href="keranjang.php">Keranjang</a></li>
		<!-- jika sudah login(ada session pelanggan)-->
		<?php if (isset($_SESSION["pelanggan"])): ?>
		<li><a href="logout.php">Logout</a>
		<!-- selain itu(belum login || belum ada session pelanggan)-->
		<?php else: ?>
		<li><a href="login.php">Login</a></li>
	<?php endif ?>
		<li><a href="checkout.php">Checkout</a></li>
	</ul>
</div>
</nav>
<!-- konten -->
<section class="konten">
	 <div class="container">
	 	<!-- nota disini copas saja dari nota yang ada di admin -->
	 	

	 	<table class="table table-bordered">
	 		<thead>
	 			<tr>
	 				<th>No</th>
	 				<th>Nama Produk</th>
	 				<th>Harga</th>
	 				<th>Jumlah</th>
	 				<th>Subtotal</th>
	 			</tr>
	 		</thead>
	 	<tbody>
	 		<?php $nomor = 1; ?>
	 		<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
	 		<?php while($pecah=$ambil->fetch_assoc()){ ?>
	 		<tr>
	 			<td><?php echo $nomor; ?></td>
	 			<td><?php echo $pecah['nama_produk']; ?></td>
	 			<td><?php echo $pecah['harga_produk']; ?></td>
	 			<td><?php echo $pecah['jumlah']; ?></td>
	 			<td>
	 				<?php echo $pecah['harga_produk']*$pecah['jumlah']; ?>
	 			</td>
	 		</tr>
	 		<?php $nomor++ ?>
	 		<?php } ?>
	 		<?phpif (isset($_POST["checkout"]))
	 		{
	 			$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
	 			$id_ongkir = $_POST["id_ongkir"];
	 			$tanggal_pembelian = date("Y-m-d");
	 			$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir'");
	 			$arrayongkir = $ambil->fetch_assoc();
	 			$tarif = $arrayongkir['tarif'];
	 			$total_pembelian = $total_belanja + $tarif;

	 			//1. menyimpan data ke tabel pembelian
	 			$koneksi->query("INSERT INTO pembelian (ic_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian')");
	 			//mendapatkan id_pembelian barusan terjadi
	 			$id_pembelian_barusan = $koneksi->insert_id;

	 			foreach ($_SESSION["keranjang"] as $id_produk => $jumlah)
	 			{
	 				$koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah) VALUES ('$id_pembelian', '$id_produk', '$jumlah')");
	 			}
	 			//mengosongkan keranjang belanja
	 			unset($_SESSION["keranjang"]);

	 			//tampilan dialihkan ke halamn nota, nota dari pembelian yang barusan
	 			echo "<script>alert('Pembelian Sukses');</script>";
	 			echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
	 		}
	 		?>
	 	</tbody>
	 	</table>
	 	<div class="row">
	 		<div class="col-md-7">
	 		<div class="alert alert-info">
	 			<p>
	 				Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> Berlin <br>
	 				<strong>BANK MANDIRI 137-001088-3272 AN. Berliani Fia</strong>
	 			</p>
	 		</div>
	 	</div>
	 </div>
</div>
	</section>
</body>
</html>