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
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!--Import jQuery before materialize.js-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/materialize.js"></script>
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
	<div class="navbar-fixed">
	<nav>
    	<div class="container">
					
						<div class="nav-wrapper">

								<ul class="left" style="margin-left: -52px;">
									<li><a href="index.php">HOME</a></li>
                                    <li><a href="daftar_hp.php">DAFTAR ALTERNATIF</a></li>
									<li><a class="active" href="rekomendasi.php">CARI REKOMENDASI</a></li>
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
                                                <center><h4>Tentukan Bobot Kepentingan Kriteria</h4></center>
                                                <br>
                                                <form class = "col s12" method="POST" action="hasil.php">
                                                    <div class = "row">
                                                        <div class="col s12">

                                                        <div class="col s6" style="margin-top: 10px;">
											                <b>(C1) Panjang Jalan</b>
										                </div>
										                <div class="col s6">
															<select required name="panjang_jl">
                                                                    <option value = "" disabled selected>Panjang</option> 
                                                                    <option value = "1">(1) Sangat Rendah</option>
                                                                    <option value = "2">(2) Rendah</option>
                                                                    <option value = "3">(3) Cukup</option>
                                                                    <option value = "4">(4) Tinggi</option>
                                                                    <option value = "5">(5) Sangat Tinggi</option>
                                                        	</select>
										                </div>

                                                        <div class="col s6" style="margin-top: 10px;">
											                <b>(C2) Lebar Jalan</b>
										                </div>
										                <div class="col s6">
														<select required name="lebar_jl">
                                                                    <option value = "" disabled selected>Lebar</option> 
                                                                    <option value = "1">(1) Sangat Rendah</option>
                                                                    <option value = "2">(2) Rendah</option>
                                                                    <option value = "3">(3) Cukup</option>
                                                                    <option value = "4">(4) Tinggi</option>
                                                                    <option value = "5">(5) Sangat Tinggi</option>
                                                        	</select>
										                </div>

                                                        <div class="col s6" style="margin-top: 10px;">
											                <b>(C3) Panjang Kerusakan</b>
										                </div>
										                <div class="col s6">
														<select required name="kondisi_jl">
                                                                    <option value = "" disabled selected>Kondisi</option> 
                                                                    <option value = "1">(1) Sangat Rendah</option>
                                                                    <option value = "2">(2) Rendah</option>
                                                                    <option value = "3">(3) Cukup</option>
                                                                    <option value = "4">(4) Tinggi</option>
                                                                    <option value = "5">(5) Sangat Tinggi</option>
                                                        	</select>
										                </div>

                                                        <div class="col s6" style="margin-top: 10px;">
											                <b>(C4) Lalu Lintas Harian</b>
										                </div>
										                <div class="col s6">
															<select required name="lantas_jl">
                                                                    <option value = "" disabled selected>Lalin</option> 
                                                                    <option value = "1">(1) Sangat Rendah</option>
                                                                    <option value = "2">(2) Rendah</option>
                                                                    <option value = "3">(3) Cukup</option>
                                                                    <option value = "4">(4) Tinggi</option>
                                                                    <option value = "5">(5) Sangat Tinggi</option>
                                                        	</select>
										                </div>

                                                        <div class="col s6" style="margin-top: 10px;">
											                <b>(C5) Anggaran Perbaikan</b>
										                </div>
										                <div class="col s6">
															<select required name="anggaran_jl">
                                                                    <option value = "" disabled selected>Anggaran</option> 
                                                                    <option value = "1">(1) Sangat Rendah</option>
                                                                    <option value = "2">(2) Rendah</option>
                                                                    <option value = "3">(3) Cukup</option>
                                                                    <option value = "4">(4) Tinggi</option>
                                                                    <option value = "5">(5) Sangat Tinggi</option>
                                                        	</select>
										                </div>
                                                            
                                                        </div>  
                                                    <center><button type="submit" class="waves-effect waves-light btn" style="margin-bottom:-46px;">Perhitungan</button></center>	
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