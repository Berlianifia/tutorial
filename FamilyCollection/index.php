<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","olshop");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Family Collection</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="bootstrap/js/jquery-3.5.0.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="css/style.css"/>
          <style>
body {
  background-color:  #ccccb3;
}
</style>
</head>
<body>


<!-- navbar -->
<nav class="navbar" style="background-color: #6b6b47;>
	<div class="container">
	<ul class="nav navbar-nav">
		<li><a href="index.php" style="color: white">Home</a></li>
		<li><a href="keranjang.php" style="color: white">Keranjang</a></li>
		<li><a href="login.php" style="color: white">Login</a></li>
		<li><a href="checkout.php" style="color: white">Checkout</a></li>
	</ul>
</div>
</nav>


<!-- konten -->
<section class="konten">
	 <div class="container">
	 	<h1>Welcome to Family Collection</h1>
              <div class="row text-center">
                <?php $ambil = $koneksi->query("SELECT * FROM produk "); ?>
                <?php while($perproduk = $ambil->fetch_assoc()){ ?>

                  <div class="col-md-3 col-sm-6">
                      <div class="thumbnail">
                          <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" width="220" height="100" alt="">
                          <div class="caption">
                              <h3><?php echo $perproduk['nama_produk']; ?></h3>
                              <h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
                            
                             <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
                          </div>
                      </div>
                  </div>
                  <?php }?>
                  
                  
                      </div>
                      
                      
                      
                  </div>
                  
              </div>
             
          </div><br>
       <footer class="fo">
           <div class="container">
               <center>
                   <p>Copyright <small>&copy;</small> Family Collection | All Rights Reserved</p>
               </center>
           </div>
           
           
       </footer>
        
        </section>
    </body>
</html>
