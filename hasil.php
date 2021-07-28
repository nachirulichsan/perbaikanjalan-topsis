<?php 
session_start();
include('class/connection.php');

//Bobot
$W1	= $_POST['panjang_jl'];
$W2	= $_POST['lebar_jl'];
$W3	= $_POST['kondisi_jl'];
$W4	= $_POST['lantas_jl'];
$W5	= $_POST['anggaran_jl'];

//Pembagi Normalisasi
function pembagiNM($matrik){
	for($i=0;$i<5;$i++){
		$pangkatdua[$i] = 0;
		for($j=0;$j<sizeof($matrik);$j++){
			$pangkatdua[$i] = $pangkatdua[$i] + pow($matrik[$j][$i],2);}
		$pembagi[$i] = sqrt($pangkatdua[$i]);
	}
	return $pembagi;
}

//Normalisasi
function Transpose($squareArray) {

    if ($squareArray == null) { return null; }
    $rotatedArray = array();
    $r = 0;

    foreach($squareArray as $row) {
        $c = 0;
        if (is_array($row)) {
            foreach($row as $cell) { 
                $rotatedArray[$c][$r] = $cell;
                ++$c;
            }
        }
        else $rotatedArray[$c][$r] = $row;
        ++$r;
    }
    return $rotatedArray;
}

function JarakIplus($aplus,$bob){
	for ($i=0;$i<sizeof($bob);$i++) {
		$dplus[$i] = 0;
		for($j=0;$j<sizeof($aplus);$j++){
			$dplus[$i] = $dplus[$i] + pow(($aplus[$j] - $bob[$i][$j]),2);
		}
		$dplus[$i] = round(sqrt($dplus[$i]),4);
	}
	return $dplus;
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
						<li><a href="rekomendasi.php">CARI REKOMENDASI</a></li>
						<li><a class="active" href="hasil.php">PERHITUNGAN</a></li>
					</ul>
				</div>

			</div>
		</nav>
	</div>
	<!-- Body Start -->

	<!-- Daftar Laptop Start -->
	<div style="background-color: #efefef">
		<div class="container">
			<div class="section-card" style="padding: 20px 0px">
				<!--   Icon Section   -->


				<center>
					<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">HASIL REKOMENDASI JALAN</h4>
				</center>
				<ul>
					<li>
						<div class="row">
							<div class="card">
								<div class="card-content">
									<h5 style="margin-bottom: 16px; margin-top: -6px;">Matriks X<small>ij</small></h5>
									<table class="responsive-table">

										<thead style="border-top: 1px solid #d0d0d0;">
											<tr>
												<th><center>Alternatif</center></th>
												<th><center>C1</center></th>
												<th><center>C2</center></th>
												<th><center>C3</center></th>
												<th><center>C4</center></th>
												<th><center>C5</center></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$query=mysqli_query($selectdb,"SELECT * FROM datajalan1");
											$no=1;
											while ($datajalan1=mysqli_fetch_array($query)) {
												$Matrik[$no-1]=array($datajalan1['panjang_jml'],$datajalan1['lebar_jml'],$datajalan1['kondisi_jml'],$datajalan1['lantas_jml'],$datajalan1['anggaran_jml'] );
												?>
												<tr>
													<td><center><?php echo "A",$no ?></center></td>
													<td><center><?php echo $datajalan1['panjang_jml'] ?></center></td>
													<td><center><?php echo $datajalan1['lebar_jml'] ?></center></td>
													<td><center><?php echo $datajalan1['kondisi_jml'] ?></center></td>
													<td><center><?php echo $datajalan1['lantas_jml'] ?></center></td>
													<td><center><?php echo $datajalan1['anggaran_jml'] ?></center></td>
												</tr>
												<?php
												$no++;
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</li>
				</ul>


				<center>
					<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Matriks Ternormalisasi</h4>
				</center>
				<ul>
					<li>
						<div class="row">
							<div class="card">
								<div class="card-content">
									<h5 style="margin-bottom: 16px; margin-top: -6px;">Ternormalisasi</h5>
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
											$pembagiNM=pembagiNM($Matrik);
											while ($datajalan1=mysqli_fetch_array($query)) {

												$MatrikNormalisasi[$no-1]=array($datajalan1['panjang_jml']/$pembagiNM[0],
													$datajalan1['lebar_jml']/$pembagiNM[1],
													$datajalan1['kondisi_jml']/$pembagiNM[2],
													$datajalan1['lantas_jml']/$pembagiNM[3],
													$datajalan1['anggaran_jml']/$pembagiNM[4]);

													?>
													<tr>
														<td><center><?php echo "A",$no ?></center></td>
														<td><center><?php echo round($datajalan1['panjang_jml']/$pembagiNM[0],6)?></center></td>
														<td><center><?php echo round($datajalan1['lebar_jml']/$pembagiNM[1],6) ?></center></td>
														<td><center><?php echo round($datajalan1['kondisi_jml']/$pembagiNM[2],6) ?></center></td>
														<td><center><?php echo round($datajalan1['lantas_jml']/$pembagiNM[3],6) ?></center></td>
														<td><center><?php echo round($datajalan1['anggaran_jml']/$pembagiNM[4],6) ?></center></td>
													</tr>
													<?php
													$no++;
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</li>
					</ul>


					<center>
						<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Bobot Kepentingan</h4>
					</center>
					<ul> 
						<li>
							<div class="row">
								<div class="card">
									<div class="card-content">
									<h5 style="margin-bottom: 16px; margin-top: -6px;">Kepentingan</h5>
										<table class="responsive-table">
											<thead>
												<tr>
													<th><center>C1 (Benefit)</center></th>
													<th><center>C2 (Benefit)</center></th>
													<th><center>C3 (Benefit)</center></th>
													<th><center>C4 (Benefit)</center></th>
													<th><center>C5 (Cost)</center></th>
												</tr>
											</thead>
											<tbody>
												<!--count($W)-->
												<tr>
													<td><center><?php echo($W1);?></center></td>
													<td><center><?php echo($W2);?></center></td>
													<td><center><?php echo($W3);?></center></td>
													<td><center><?php echo($W4);?></center></td>
													<td><center><?php echo($W5);?></center></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</li>
					</ul>


					<center>
						<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Matriks Ternormalisasi Terbobot</h4>
					</center>
					<ul>
						<li>
							<div class="row">
								<div class="card">
									<div class="card-content">
										<h5 style="margin-bottom: 16px; margin-top: -6px;">Ternormalisasi Terbobot (Y)</h5>
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
												$pembagiNM=pembagiNM($Matrik);
												while ($datajalan1=mysqli_fetch_array($query)) {
													
													$NormalisasiBobot[$no-1]=array(
														$MatrikNormalisasi[$no-1][0]*$W1,
														$MatrikNormalisasi[$no-1][1]*$W2,
														$MatrikNormalisasi[$no-1][2]*$W3,
														$MatrikNormalisasi[$no-1][3]*$W4,
														$MatrikNormalisasi[$no-1][4]/$W5);

														?>
														<tr>
															<td><center><?php echo "A",$no ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][0]*$W1,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][1]*$W2,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][2]*$W3,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][3]*$W4,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][4]/$W5,6) ?></center></td>
														</tr>
														<?php
														$no++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
						</ul>


						<center>
							<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Matriks Solusi Ideal Positif Dan Negatif
							</h4>
						</center>
						<ul>
							<li>
								<div class="row">
									<div class="card">
										<div class="card-content">
											<h5 style="margin-bottom: 16px; margin-top: -6px;">Solusi Ideal Positif "A+" Dan Negatif "A-"
											</h5>
											<table class="responsive-table">

												<thead style="border-top: 1px solid #d0d0d0;">
													<tr>
														<th><center></center></th>
														<th><center>Y1 (Benefit)</center></th>
														<th><center>Y2 (Benefit)</center></th>
														<th><center>Y3 (Benefit)</center></th>
														<th><center>Y4 (Benefit)</center></th>
														<th><center>Y5 (Cost)</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$NormalisasiBobotTrans = Transpose($NormalisasiBobot);
													?>
													<tr>
														<?php  
														$idealpositif=array(max($NormalisasiBobotTrans[0]),max($NormalisasiBobotTrans[1]),max($NormalisasiBobotTrans[2]),max($NormalisasiBobotTrans[3]),min($NormalisasiBobotTrans[4]));
														?>
														<td><center><?php echo "A+" ?> </center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[0]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[1]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[2]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[3]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[4]),6));?>&nbsp(min)</center></td>
													</tr>
													<tr>
														<?php  
														$idealnegatif=array(min($NormalisasiBobotTrans[0]),min($NormalisasiBobotTrans[1]),min($NormalisasiBobotTrans[2]),min($NormalisasiBobotTrans[3]),max($NormalisasiBobotTrans[4]));
														?>
														<td><center><?php echo "A-" ?> </center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[0]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[1]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[2]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[3]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[4]),6));?>&nbsp(max)</center></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
						</ul>


						<center>
							<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Jarak Euclidean (separation measure)</h4>
						</center>
						<ul>
							<li>
								<div class="row">
									<div class="card" style="margin-left: 320px;margin-right: 320px;">
										<div class="card-content">
											<table class="responsive-table" >

												<thead style="border-top: 1px solid #d0d0d0;">
													<tr>
														<th><center>D+</center></th>
														<th><center></center></th>
														<th><center>D-</center></th>
														<th><center></center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$query=mysqli_query($selectdb,"SELECT * FROM datajalan1");
													$no=1;
													$Dplus=JarakIplus($idealpositif,$NormalisasiBobot);
													$Dmin=JarakIplus($idealnegatif,$NormalisasiBobot);
													while ($datajalan1=mysqli_fetch_array($query)) {

														?>
														<tr>
															<td><center><?php echo "D",$no ?></center></td>
															<td><center><?php echo round($Dplus[$no-1],6) ?></center></td>
															<td><center><?php echo "D",$no ?></center></td>
															<td><center><?php echo round($Dmin[$no-1],6) ?></center></td>
														</tr>
														<?php
														$no++;
													}
													?>
												</tbody>
											</table>

										</div>
									</div>
								</div>
							</li>
						</ul>


						<center>
							<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Nilai Preferensi (V)</h4>
						</center>
						<ul>
							<li>
								<div class="row">
									<div class="card" style="margin-left: 320px;margin-right: 320px;">
										<div class="card-content">
											<table class="responsive-table" >

												<thead style="border-top: 1px solid #d0d0d0;">
													<tr>
														<th><center>Nilai Preferensi</center></th>
														<th><center>Nilai</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$query=mysqli_query($selectdb,"SELECT * FROM datajalan1");
													$no=1;
													$nilaiV = array();
													while ($datajalan1=mysqli_fetch_array($query)) {
														
														array_push($nilaiV, $Dmin[$no-1]/($Dmin[$no-1]+$Dplus[$no-1]));
														?>
														<tr>
															<td><center><?php echo "V",$no ?></center></td>
															<td><center><?php echo $Dmin[$no-1]/($Dmin[$no-1]+$Dplus[$no-1]); ?></center></td>
														</tr>
														<?php
														$no++;
													}

													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
						</ul>


						<center>
							<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Nilai Preferensi Tertinggi
							</h4>
						</center>
						<ul>
							<li>
								<div class="row">
									<div class="card" style="margin-left: 300px;margin-right: 300px;">
										<div class="card-content">
											<table class="responsive-table" >

												<thead style="border-top: 1px solid #d0d0d0;">
													<tr>
														<th><center>Hasil Tertinggi</center></th>
														<th></th>
														<th><center>Alternatif Yang Terpilih</center></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<?php
														$testmax = max($nilaiV);
														for ($i=0; $i < count($nilaiV); $i++) { 
															if ($nilaiV[$i] == $testmax) {
																$query=mysqli_query($selectdb,"SELECT * FROM datajalan1 where id = $i+1");
																?>
																<td><center><?php echo "V".($i+1); ?></center></td>
																<td><center><?php echo $nilaiV[$i]; ?></center></td>
																<?php while ($user=mysqli_fetch_array($query)) { ?>
																<td><center><?php echo $user['nama']; ?></center></td>
																<?php
															}
														}
													} ?>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</li>
					</ul>
					<div class="row center" \>
						<a href="rekomendasi.php" id="download-button" class="waves-effect waves-light btn" style="margin-top: 0px">Perhitungan Ulang</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Daftar Laptop End -->

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
			});
		</script>
	</body>
	</html>