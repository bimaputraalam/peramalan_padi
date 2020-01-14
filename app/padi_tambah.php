<?php
include '../function/function_metode.php';



if (isset($_POST['simpan'])) {
	if (tambah($_POST) > 0) {
	
		echo "<script>"
		. "alert('Data Berasil Di Tambahkan');"
		. "document.location.href = 'master_data.php';"
		. "</script>";
	}
	else{
		
		echo "<script>"
		. "alert('Data Gagal DiTambahkan')"
		. "</script>";
	}
	
	
}

include '../templating/atas.php';
include '../templating/navigation_bar.php';



?>

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<h4 class="page-title">Master Data</h4>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-6">
		<div class="card-box">
			<h4 class="header-title m-t-0 m-b-30">Input Data</h4>
			<div class="row">
				<div class="col-xl-12">
					<form action="" method="POST">
						<fieldset class="form-group">
							<label for="exampleInputEmail1">Tanggal</label>
							<input class="form-control" type="month" value="2020-01" id="example-month-input"
							name="tanggal" required>
						</fieldset>
						<fieldset class="form-group">
							<label for="exampleInputEmail1">Hasil Penen</label>
							<input type="number" class="form-control" id="exampleInputEmail1"
							name="hasil_panen" 
							placeholder="Masukkan Hasil Panen" required>
						</fieldset>
						
						<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>



<?php
include '../templating/footer.php';
include '../templating/bawah.php';

?>