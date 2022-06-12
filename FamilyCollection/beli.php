<?php
session_start();
//koneksi ke database
$id_produk = $_GET['id'];

//jika sudah ada produk itu dikeranjang, aka produk itu jumlahnya di +1 
if(isset($_SESSION['keranjang']['id_produk']))
{
	$_SESSION['keranjang']['id_produk']+=1;
}
// selain itu (belum ada di keranjang), maka produk itu dianggap dibeli 1
else
{
	$_SESSION['keranjang']['id_produk'] = 1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";


echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>";
?>