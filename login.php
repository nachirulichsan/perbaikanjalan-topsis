<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors","On");
require_once 'class/loginpage.php';// add 
?>

<!DOCTYPE html>
<html>
<head>
	<title>SPK Perbaikan Jalan</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/>
	<link rel="stylesheet" href="assets/css/table.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/image/favicon.ico">
	<!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--Import jQuery before materialize.js-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/materialize.js"></script>
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
	<div class="navbar-fixed">
	<nav>
    	<div class="container">
					
						<div class="nav-wrapper">

								<ul class="left" style="margin-left: -52px;">
									<li><a href="index.php">HOME</a></li>
                                    <li><a class="active" href="login.php">LOGIN</a></li>
                                    <li><a href="#about">TENTANG</a></li>
								</ul>
						</div>
					
        </div>
		</nav>
		</div>
		<!-- Body Start -->

		<!-- Daftar Start -->
        <div style="background-color: #efefef">
            <div class="container">
                <div class="section-card" style="padding: 32px 0px 20px 0px">
                    <ul>
                        <li>
                            <div class="row">
                                <div class="col s3">
                                </div>
                                <div class="col s6">      
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="row">
                                                <center><img src="assets/image/road.png"></center>
                                                <center><h4><b>LOGIN</b></h4></center>
                                                <center><p>Login Untuk Masuk Sistem</p></center>
                                                <br>
                                                <form class = "col s12" method="POST" action="rekomendasi.php">
                                                    <div class = "row">
                                                        <div class="col s12">
                                                        <div class="col s6" style="margin-top: 10px;">
											                <b>Username</b>
										                </div>
										                <div class="col s6">
											                <input style="height: 2rem;" name="myusername" type="text" required>
                                                        </div>
                                                        
                                                        <div class="col s6" style="margin-top: 10px;">
											                <b>Password</b>
										                </div>
										                <div class="col s6">
											                <input style="height: 2rem;" name="mypass" type="password" required>
										                </div>
                                                            
                                                        </div>  
                                                    <center><button type="submit" name="login" class="waves-effect waves-light btn" style="margin-bottom:-46px;" onclick="sweetAlert()">Login</button></center>
                                                    <script type="text/javascript">
                                                    function sweetAlert(){
                                                        Swal.fire({
                                                            type: 'info',
                                                            title: 'Login',
                                                            text: 'Isi Form Dengan Benar Untuk Login!'
                                                        })
                                                    }
                                                    </script>
                                                </form>       
                                            </div>
                                        </div>
                                    </div>                    
                                </div>
                                <div class="col s3">
                                </div>
                            </div>
                        </li>
                    </ul>	     
                </div>
            </div>
        </div>
        <!-- Rekomendasi End -->
        <div id="about" class="modal">
    <div class="modal-content">
      <h4>Kelompok 2 (4C)</h4>
	 	<p>Sistem Pendukung Keputusan Menentukan Prioritas Perbaikan Jalan di Kota Tegal Menggunakan Metode TOPSIS Berbasis Web<br>
				<br>
				<b>Anggota :</b><br>
				(19090021) M. Ndaru Sabiturahman<br>
				(19090023) Muchammad Nachirul Ichsan<br>
				(19090091) Alfin Nurochali<br>
		</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Tutup</a>
    </div>
	</div>

    <!-- Body End -->

    <!-- Footer Start -->
	<div class="footer-copyright" style="padding: 0px 0px; background-color: white">
      <div class="container">
        <p align="center" style="color: #999">&copy; Sistem Pendukung Keputusan Project.</p>
      </div>
    </div>
    <!-- Footer End -->
    <script type="text/javascript">
	  $(document).ready(function(){
	      $('.parallax').parallax();
          $('select').material_select();
          $('.modal').modal();
	    });
    </script>
</body>
</html>

<?php
if (isset($_POST['login'])){
    $myusername = $_POST['myusername'];
    $myuserpwd = $_POST['mypass'];
    $saveUser = new Login($myusername,$myuserpwd);
    $saveUser->checkUserPwd();
}
?>