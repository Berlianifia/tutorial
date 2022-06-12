<h2>Data Produk</h2>

<table class= "table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama</th>
			<th>harga</th>
			<th>berat</th>
			<th>foto</th>
			<th>aksi</th>
		</tr>
		 <style>
body {
  background-color:  #ccccb3;
}
</style>
	</thead>
	<tbody>
			<?php $nomor=1; ?>
			<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
			<?php while($pecah = $ambil->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['nama_produk']; ?> </td>
				<td><?php echo $pecah['harga_produk']; ?> </td>
				<td><?php echo $pecah['berat_produk']; ?> </td>
				<td>
					<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
				</td>
				<td>
				<a href="index.php?halaman=hapus_produk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-danger">hapus</a>
				<a href="index.php?halaman=ubah_produk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning">
				ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>

		</tbody>
	</table>
	<a href="index.php?halaman=tambah_produk" class="btn btn-primary">Tambah Data</a>
	
