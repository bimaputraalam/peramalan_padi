<?php
include '../function/function_metode.php';

$id = $_GET['id'];
// var_dump($id);
// die;

if (hapus($id) > 0) {
	echo "<script>"
	. "alert('Data Berasil Di Hapus');"
	. "document.location.href = 'master_data.php';"
	. "</script>";
}
else{
	echo "<script>"
	. "alert('Data Gagal Di Hapus')"
	. "</script>";
}


?>