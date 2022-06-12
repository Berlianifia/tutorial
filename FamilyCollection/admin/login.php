<?php
session_start();
//skrip koneksi
$koneksi = new mysqli("localhost","root","","olshop");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Family Collection</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <style>
body {
  background-color:  #ccccb3;
}
</style>
</head>
<body>
    <div class="container">
        <div class="row text-center"> 
            <div class="col-md-12">
                <br /><br />
                <h2 style="color:black">FamilyCollection</h2>

                <h5>( Login yourself to get access )</h5>
                <br />
            </div>
        </div>
             <div class="row">

                <div class="col-md-4 col-md-offset-4 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                    <div class="panel panel-default">
                        <div class="panel_heading">
                        <h5 class="text-center" style="color:black" >Enter Detail To Login </h5>
                    </div>
                    <div class="panel-body" style="color:black">

                        <form style="color:black" role="form" method="post">
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon" style="color:black"><i class="fa fa-tag" ></i></span>
                                <input type="text" class="form-control" name="user" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon" style="color:black"><i class="fa fa-lock" ></i></span>
                                <input type="password" class="form-control" name="pass" />
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" /> Remember me
                                </label>
                                <span class="pull-right">
                                    <a href="#" >Forget Password ? </a>
                                </span>
                            </div>

                            <button class="btn btn-primary" name="login">Login</button>
                            <hr />
                            Not Register ? <a href="registeration.html" > click here </a>
                        </form>
                        <?php
                        if (isset($_POST['login']))
                        {
                        $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password='$_POST[pass]'");
                        $yangcocok = $ambil->num_rows;
                        if ($yangcocok==1)
                        {
                            $_SESSION['$admin']=$ambil->fetch_assoc();
                                echo "<div class='alert alert-info'>Login sukses</div>";
                                echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                            } 
                            else
                            {
                                echo "<div class='alert alert-danger'>Login Gagal</div>";
                                echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                            }
                            }
                            ?>
                    </div>

                </div>
            </div>
                  
        </div>
        </div>

        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>