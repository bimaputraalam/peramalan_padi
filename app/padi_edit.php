<?php
include '../function/function_metode.php';
$id = $_GET['id'];

// var_dump($id);
// die;


$edit = tampil("SELECT * FROM padi WHERE id = $id")[0];


// var_dump($edit);
// die;

if (isset($_POST['update'])) {
	if (update($id,$_POST) > 0) {

		echo "<script>"
		. "alert('Data Berasil Di Update');"
		. "document.location.href = 'master_data.php';"
		. "</script>";
	}
	else{

		echo "<script>"
		. "alert('Data Gagal Di Update')"
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
			<h4 class="header-title m-t-0 m-b-30">Edit Data</h4>
			<div class="row">
				<div class="col-xl-12">
					<form action="" method="POST">
						<fieldset class="form-group">
							<label for="exampleInputEmail1">Tanggal</label>
							<input class="form-control" type="month" value="<?= sub_tgl($edit['tanggal'])?>" id="example-month-input"
							name="tanggal" required>
						</fieldset>
						<fieldset class="form-group">
							<label for="exampleInputEmail1">Hasil Penen</label>
							<input type="number" class="form-control" id="exampleInputEmail1"
							name="hasil_panen"
							placeholder="Masukkan Hasil Panen" value="<?=$edit['hasil_panen']?>" required>
						</fieldset>

						<button type="submit" name="update" class="btn btn-warning">Update</button>
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
