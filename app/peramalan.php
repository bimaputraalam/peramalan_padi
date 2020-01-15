<?php
include '../function/function_metode.php';

$peramalan = peramalanBerdasarkanRelasi();
$jperamalan = count($peramalan);

// var_dump($peramalan);
// die;

// data pertama yang 
//tidak memiliki permalan
$data = data()[0]; 
//end


include '../templating/atas.php';
include '../templating/navigation_bar.php';

?>

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<h4 class="page-title">Peramalan</h4>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card-box">
			
			
			<table id="datatable1" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
				<thead>
					<tr>
						<th>Bulan</th>
						<th>Hasil Panen (Kg)</th>
						<th>Hasil Peramalan (Kg)</th>
						<th>MAPE (%)</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?=$data['tanggal'] ?></td>
						<td><?=$data['hasil_panen'] ?>Kg</td>
						<td>-</td>
						<td>-</td>
						
					</tr>
					<?php
					for ($i=0; $i <$jperamalan-1 ; $i++) { 
						?>
						<tr>
							<td><?=$peramalan[$i][0] ?></td>
							<td><?=$peramalan[$i][1] ?>Kg</td>
							<td><?=$peramalan[$i][2] ?>Kg</td>
							<td> 
								<?= mape($peramalan[$i][1],$peramalan[$i][2]) ?> %
							</td>	
						</tr>
						<?php
					}
					?>
					<tr>
						<td> <?=$peramalan[$jperamalan-1][0] ?> </td>
						<td> <?=$peramalan[$jperamalan-1][1] ?> </td>
						<td> <?=$peramalan[$jperamalan-1][2] ?>Kg  </td>
						<td> - </td>
					</tr>
					
				</tbody>
			</table>
		</div>
	</div>
</div> <!-- end row -->


<div id="grafik" > </div>

<!-- grafik -->
<script type="text/javascript">
	var trace1 = {
		x: <?= y_tanggal() ?>,
		y: <?= x_nilai_01() ?>,
		name: 'Nilai Aktual',
		mode: 'lines',
		type: 'scatter',
		connectgaps: true
	};

	var trace2 = {
		x: <?= y_tanggal() ?>,
		y: <?= x_nilai_02() ?>,
		name: 'Nilai Peramalan',
		mode: 'lines',
		type: 'scatter',
		connectgaps: true
	};

	var data = [trace1, trace2];

	var layout = {
		title: 'Grafik Nilai Aktual Dan Nilai Peramalan',
		showlegend: true
	};

	Plotly.newPlot('grafik', data, layout);

</script>
<!-- end grafik -->

<?php

include '../templating/footer.php';
include '../templating/bawah.php';
?>
