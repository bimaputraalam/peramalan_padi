<?php
include '../function/function_metode.php';
$datas = data();




include '../templating/atas.php';
include '../templating/navigation_bar.php';

?>

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<div class="btn-group float-right m-t-15">
				<a href="padi_tambah.php" class="btn btn-primary btn-rounded waves-effect waves-light">Tambah</a>
			</div>
			<h4 class="page-title">Master Data</h4>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card-box">
			<h4 class="m-t-0 header-title">Default Example</h4>
			<p class="text-muted font-14 m-b-30">
				DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.
			</p>

			<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
				<thead>
					<tr>
						<th>Bulan</th>
						<th>Hasil Panen</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($datas as $data) {
						?>
						<tr>
							<td><?=$data['tanggal'] ?></td>
							<td><?=$data['hasil_panen'] ?></td>
							<td><a href="padi_edit.php?id=<?=$data['id']?>" class="btn btn-warning"> Edit </a> 
								<a href="padi_hapus.php?id=<?=$data['id']?>" class="btn btn-danger" onclick="return confirm('Apakah Data Ingin Dihapus?')"> Hapus </a>
							</td>
						</tr>
						<?php
					}
					?>
					
					
				</tbody>
			</table>
		</div>
	</div>
</div> <!-- end row -->

<?php

include '../templating/footer.php';
include '../templating/bawah.php';
?>
