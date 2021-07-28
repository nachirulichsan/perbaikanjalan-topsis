<?php 
session_start();
include('class/connection.php');
?>

<?php 
	if(isset($_POST["tambah_jl"])){
		$namajl = $_POST["namajl"];
		$panjangjl = $_POST["panjangjl"];
		$lebarjl = $_POST["lebarjl"];
		$kondisijl = $_POST["kondisijl"];
		$lantasjl = $_POST["lantasjl"];
		$anggaranjl = $_POST["anggaranjl"];
		
		$panjangjl_jml = $lebarjl_jml = $kondisijl_jml = $lantasjl_jml = $anggaranjl_jml = 0;

		if($panjangjl < 1000){
			$panjangjl_jml= 1;
		} 
		elseif($panjangjl >= 1000 && $panjangjl <= 1500){
			$panjangjl_jml = 2;
		}
		elseif($panjangjl > 1500 && $panjangjl <= 2000){
			$panjangjl_jml = 3;
		}
		elseif($panjangjl > 2000 && $panjangjl <= 2500){
			$panjangjl_jml = 4;
		}
		elseif($panjangjl > 2500){
			$panjangjl_jml = 5;
		}

		if($lebarjl < 10){
			$lebarjl_jml= 1;
		} 
		elseif($lebarjl >= 10 && $lebarjl <= 15){
			$lebarjl_jml = 2;
		}
		elseif($lebarjl > 15 && $lebarjl <= 20){
			$lebarjl_jml = 3;
		}
		elseif($lebarjl > 20 && $lebarjl <= 25){
			$lebarjl_jml = 4;
		}
		elseif($lebarjl > 25){
			$lebarjl_jml = 5;
		}
		
		if($kondisijl < 1000){
			$kondisijl_jml= 1;
		} 
		elseif($kondisijl >= 1000 && $kondisijl <= 1500){
			$kondisijl_jml = 2;
		}
		elseif($kondisijl > 1500 && $kondisijl <= 2000){
			$kondisijl_jml = 3;
		}
		elseif($kondisijl > 2000 && $kondisijl <= 2500){
			$kondisijl_jml = 4;
		}
		elseif($kondisijl > 2500){
			$kondisijl_jml = 5;
		}
		
		if($lantasjl < 20){
			$lantasjl_jml= 1;
		} 
		elseif($lantasjl >= 20 && $lantasjl <= 25){
			$lantasjl_jml = 2;
		}
		elseif($lantasjl > 25 && $lantasjl <= 30){
			$lantasjl_jml = 3;
		}
		elseif($lantasjl > 30 && $lantasjl <= 35){
			$lantasjl_jml = 4;
		}
		elseif($lantasjl > 35){
			$lantasjl_jml = 5;
		}
		
		if($anggaranjl > 500){
			$anggaranjl_jml= 1;
		} 
		elseif($anggaranjl > 400 && $anggaranjl <= 500){
			$anggaranjl_jml = 2;
		}
		elseif($anggaranjl > 300 && $anggaranjl <= 400){
			$anggaranjl_jml = 3;
		}
		elseif($anggaranjl >= 200 && $anggaranjl <= 300){
			$anggaranjl_jml = 4;
		}
		elseif($anggaranjl < 200){
			$anggaranjl_jml = 5;
		}


		$sql = "INSERT INTO `datajalan1` (`id`, `nama`, `panjang`, `lebar`, `kondisi`, `lantas`, `anggaran`, `panjang_jml`, `lebar_jml`, `kondisi_jml`, `lantas_jml`, `anggaran_jml`) 
				VALUES (NULL, :nama, :panjang, :lebar, :kondisi, :lantas, :anggaran, :panjang_jml, :lebar_jml, :kondisi_jml, :lantas_jml, :anggaran_jml)";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':nama', $namajl);
		$stmt->bindValue(':panjang', $panjangjl);
		$stmt->bindValue(':lebar', $lebarjl);
		$stmt->bindValue(':kondisi', $kondisijl);
		$stmt->bindValue(':lantas', $lantasjl);
		$stmt->bindValue(':anggaran', $anggaranjl);
		$stmt->bindValue(':panjang_jml', $panjangjl_jml);
		$stmt->bindValue(':lebar_jml', $lebarjl_jml);
		$stmt->bindValue(':kondisi_jml', $kondisijl_jml);
		$stmt->bindValue(':lantas_jml', $lantasjl_jml);
		$stmt->bindValue(':anggaran_jml', $anggaranjl_jml);
		$stmt->execute();
	}

	if(isset($_POST["hapus_jl"])){
		$id_hapus_jl = $_POST['id_hapus_jl'];
		$sql_delete = "DELETE FROM `datajalan1` WHERE `id` = :id_hapus_jl";
		$stmt_delete = $pdo->prepare($sql_delete);
		$stmt_delete->bindValue(':id_hapus_jl', $id_hapus_jl);
		$stmt_delete->execute();
		$query_reorder_id=mysqli_query($selectdb,"ALTER TABLE datajalan1 AUTO_INCREMENT = 1");
	}
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

	<!-- Data Table -->
	<link rel="stylesheet" type="text/css" href="assets/dataTable/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="assets/dataTable/jquery.dataTables.min.js"></script>

</head>
<body>
	<div class="navbar-fixed">
	<nav>
    	<div class="container">
					
						<div class="nav-wrapper">
								<ul class="left" style="margin-left: -52px;">
									<li><a href="index.php">HOME</a></li>
									<li><a class="active" href="daftar_hp.php">DAFTAR ALTERNATIF</a></li>
									<li><a href="rekomendasi.php">CARI REKOMENDASI</a></li>
								</ul>
						</div>
					
        </div>
		</nav>
		</div>
		<!-- Body Start -->

		<!-- Daftar hp Start -->
	<div style="background-color: #efefef">
		<div class="container">
		    <div class="section-card" style="padding: 40px 0px 20px 0px;">
				<ul>
				    <li>
						<div class="row">
						<div class="card">
								<div class="card-content">
									<center><h4 style="margin-bottom: 0px; margin-top: -8px;">Daftar Rekomendasi</h4></center>
									<table id="table_id" class="hover dataTablesCustom" style="width:100%">
											<thead style="border-top: 1px solid #d0d0d0;">
												<tr>
													<th><center>No </center></th>
													<th><center>Nama Jalan</center></th>
													<th><center>Panjang Jalan</center></th>
													<th><center>Lebar Jalan</center></th>
													<th><center>Panjang Kerusakan</center></th>
													<th><center>Lalu Lintas Harian</center></th>
													<th><center>Anggaran</center></th>
													<th><center>Hapus</center></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query=mysqli_query($selectdb,"SELECT * FROM datajalan1");
												$no=1;
												while ($data=mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><center><?php echo $no; ?></center></td>
													<td><center><?php echo $data['nama']?></center></td>
													<td><center><?php echo $data['panjang']," m"?></center></td>
													<td><center><?php echo $data['lebar']," m"?></center></td>
													<td><center><?php echo $data['kondisi']," m"?></center></td>
													<td><center><?php echo $data['lantas']," Kendaraan/Menit"?></center></td>
													<td><center><?php echo $data['anggaran']," Juta"?></center></td>
													<td>
														<center>
															<form method="POST">
																<input type="hidden" name="id_hapus_jl" value="<?php echo $data['id'] ?>">
																<button type="submit" name="hapus_jl" style="height: 32px; width: 32px;" class="btn-floating btn-small waves-effect waves-light red"><i style="line-height: 32px;" class="material-icons">remove</i></button>
															</form>
														</center>
													</td>
												</tr>
												<?php
														$no++;}
												?>
											</tbody>
									</table>
									</div>
									
							</div>
							<a href="#tambah" class="btn-floating btn-large waves-effect waves-light teal btn-float-custom"><i class="material-icons">add</i></a>
						</div>
				    </li>
				</ul>	     
	    	</div>
		</div>
	</div>
	<!-- Daftar hp End -->

	<!-- Daftar hp Start -->
	<div style="background-color: #efefef">
		<div class="container">
		    <div class="section-card" style="padding: 1px 20% 24px 20%;">
				<ul>
				    <li>
						<div class="row">
							<div class="card">
								<div class="card-content" style="padding-top: 10px;">
									<center><h5 style="margin-bottom: 10px;">Matriks X<small>ij</small></h5></center>
									<table class="responsive-table">
									
											<thead style="border-top: 1px solid #d0d0d0;">
												<tr>
													<th><center>Alternatif</center></th>
													<th><center>C1 (Benefit)</center></th>
													<th><center>C2 (Benefit)</center></th>
													<th><center>C3 (Benefit)</center></th>
													<th><center>C4 (Benefit)</center></th>
													<th><center>C5 (Cost)</center></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query=mysqli_query($selectdb,"SELECT * FROM datajalan1");
												$no=1;
												while ($data=mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><center><?php echo "A",$no ?></center></td>
													<td><center><?php echo $data['panjang_jml'] ?></center></td>
													<td><center><?php echo $data['lebar_jml'] ?></center></td>
													<td><center><?php echo $data['kondisi_jml'] ?></center></td>
													<td><center><?php echo $data['lantas_jml'] ?></center></td>
													<td><center><?php echo $data['anggaran_jml'] ?></center></td>
												</tr>
												<?php
														$no++;}
												?>
											</tbody>
									</table>
									</div>
							</div>
						</div>
				    </li>
				</ul>	     
	    	</div>
		</div>
	</div>
	<!-- Daftar hp End -->

	<!-- Modal Start -->
	<div id="tambah" class="modal" style="width: 40%; height: 100%;">
		<div class="modal-content">
			<div class="col s6">
					<div class="card-content">
						<div class="row">
							<center><h5 style="margin-top:-8px;">Masukan Rekomendasi Jalan</h5></center>
							<form method="POST" action="">
								<div class = "row">
									<div class="col s12">

										<div class="col s6" style="margin-top: 10px;">
											<b>Nama</b>
										</div>
										<div class="col s6">
											<input style="height: 2rem;" name="namajl" type="text" required>
										</div>

										<div class="col s6" style="margin-top: 10px;">
											<b>Panjang</b>
										</div>
										<div class="col s6">
											<input style="height: 2rem;" name="panjangjl" type="number" required>
										</div>

										<div class="col s6" style="margin-top: 10px;">
											<b>Lebar</b>
										</div>
										<div class="col s6">
											<input style="height: 2rem;" name="lebarjl" type="number" required>
										</div>

										<div class="col s6" style="margin-top: 10px;">
											<b>Panjang Kerusakan</b>
										</div>
										<div class="col s6">
											<input style="height: 2rem;" name="kondisijl" type="number" required>
										</div>

										<div class="col s6" style="margin-top: 10px;">
											<b>Lalu Lintas Harian</b>
										</div>
										<div class="col s6">
											<input style="height: 2rem;" name="lantasjl" type="number" required>
										</div>

										<div class="col s6" style="margin-top: 10px;">
											<b>Anggaran</b>
										</div>
										<div class="col s6">
											<input style="height: 2rem;" name="anggaranjl" type="number" required>
										</div>

									</div>  
								</div> 
								<center><button name="tambah_jl" type="submit" class="waves-effect waves-light btn teal" style="margin-top: 0px;">Tambah</button></center>	
							</form>
						</div>
					</div>
				</div>
			</div>
		<div style="height: 0px; "class="modal-footer">
          <a style="margin-top: -30px;" class="modal-action modal-close waves-effect waves-green btn-flat">Tutup</a>
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
		$('.modal').modal();
		$('#table_id').DataTable({
    		"paging": false
		});
	    });
	</script>
</body>
</html>