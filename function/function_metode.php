<?php

$link = mysqli_connect("localhost","root","","bima_padi");


// metode fuzzy time series cheng-----------------------------------------------
// data
function data(){
  global $link;
  $result = mysqli_query($link,"SELECT * FROM padi");
  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;


  // $data = [
  //   ['bulan' =>'januari-2014','produksi' => 134], // 2014
  //   ['bulan' =>'febuari-2014','produksi' => 176],
  //   ['bulan' => 'maret-2014','produksi' => 200],
  //   ['bulan' => 'april-2014','produksi' => 186],
  //   ['bulan' => 'mei-2014','produksi' => 155],
  //   ['bulan' => 'juni-2014','produksi' => 187],
  //   ['bulan' => 'juli-2014','produksi' => 142],
  //   ['bulan' => 'agustus-2014','produksi' => 122],
  //   ['bulan' => 'september-2014','produksi' => 112],
  //   ['bulan' => 'oktober-2014','produksi' => 156],
  //   ['bulan' => 'november-2014','produksi' => 192],
  //   ['bulan' => 'desember-2014','produksi' => 166],
  //   ['bulan' => 'januari-2015','produksi' => 143], // 2015
  //   ['bulan' => 'febuari-2015','produksi' => 166], //000

  // ];
  // return $data;
}
// function data(){
//   $data = [
//     ['bulan' =>'januari-2014','produksi' => 37185], // 2014
//     ['bulan' =>'febuari-2014','produksi' => 42600],
//     ['bulan' => 'maret-2014','produksi' => 36700],
//     ['bulan' => 'april-2014','produksi' => 27427],
//     ['bulan' => 'mei-2014','produksi' => 26111],
//     ['bulan' => 'juni-2014','produksi' => 25952],
//     ['bulan' => 'juli-2014','produksi' => 27889],
//     ['bulan' => 'agustus-2014','produksi' => 26900],
//     ['bulan' => 'september-2014','produksi' => 34364],
//     ['bulan' => 'oktober-2014','produksi' => 50174],
//     ['bulan' => 'november-2014','produksi' => 75200],
//     ['bulan' => 'desember-2014','produksi' => 85455],
//     ['bulan' => 'januari-2015','produksi' => 65238], // 2015
//     ['bulan' => 'febuari-2015','produksi' => 39053],
//     ['bulan' => 'maret-2015','produksi' => 30727],
//     ['bulan' => 'april-2015','produksi' => 30667],
//     ['bulan' => 'mei-2015','produksi' => 38600],
//     ['bulan' => 'juni-2015','produksi' => 44286],
//     ['bulan' => 'juli-2015','produksi' => 45474],
//     ['bulan' => 'agustus-2015','produksi' => 51000],
//     ['bulan' => 'september-2015','produksi' => 46286],
//     ['bulan' => 'oktober-2015','produksi' => 28000],
//     ['bulan' => 'november-2015','produksi' => 31429],
//     ['bulan' => 'desember-2015','produksi' => 46750],
//     ['bulan' => 'januari-2016','produksi' => 50300], // 2016
//     ['bulan' => 'febuari-2016','produksi' => 47200],
//     ['bulan' => 'maret-2016','produksi' => 49524],
//     ['bulan' => 'april-2016','produksi' => 35714],
//     ['bulan' => 'mei-2016','produksi' => 34818],
//     ['bulan' => 'juni-2016','produksi' => 35727],
//     ['bulan' => 'juli-2016','produksi' => 38500],
//     ['bulan' => 'agustus-2016','produksi' => 42609],
//     ['bulan' => 'september-2016','produksi' => 53714],
//     ['bulan' => 'oktober-2016','produksi' => 68571],
//     ['bulan' => 'november-2016','produksi' => 62100],
//     ['bulan' =>'desember-2016','produksi' => 64300]
//   ];
//   return $data;
// }
// end data
// menentukan himpunan sementara
// max = ?
// min = ?
function max_min(){
  foreach (data() as $nilai) {
    $n [] = $nilai['hasil_panen'];
  }
  $max =  max($n);
  $min =  min($n);
  $max_min = [
    'max' => $max,
    'min' => $min
  ];
  return $max_min;
}
// end menentukan himpunan sementara
// menentukan interval
function interval(){
  $jData = count(data()); // jumlah data
  $jInterval = round(1 + 3.3 * log($jData,10)); // jumlah interval
  $max = max_min()['max'];
  $min = max_min()['min'];
  $lInterval = round(($max - $min) / $jInterval,2);// lebar interval
  $interval = [
    'jumlah_interval' => $jInterval,
    'lebar_interval' => $lInterval
  ];
  return $interval;
}
// end menentukan interval
// menghitung interval
function hitung_interval(){
  $jInterval = interval()['jumlah_interval']; // jumlah interval
  $lInterval =  interval()['lebar_interval']; // lebar interval



  // return $jInterval;
  $awal = max_min()['min'];
  //$hit = max_min()['min'];
  $n = $awal;
  for($i=0; $i < (integer)$jInterval; $i++) {
   $n = $n + $lInterval;
   if ($i == 0) {
    $d = [$awal,round($n,2)];
  }
  else{
    $a = $data[$i-1][1];
    $d = [$a ,round($n,2)];
  }
    $data [] = $d; // himpunan sementara U
  }
  // return $data;
  // menghitung frekuensi
  $tInterval =  count($data); // total interval
  for ($i=0; $i <$tInterval ; $i++) {
    $jFrek = 0; // jumlah frekuensi
    // $no = $i+1;
    // $string = 'u'.$i+1;
    foreach(data() as $nilai){
      if ( ($nilai['hasil_panen'] >= $data[$i][0]) && ($nilai['hasil_panen'] <= $data[$i][1]) ) {
        $jFrek++;
      }
    }
    // $frekuensi [] = ['u'.$no => $jFrek];
    $frekuensi [] =  $jFrek;
  }
  // return $frekuensi;
  // end menghitung frekuensi
  // interval berdasarkan frekuensi
  // jika nilai frekuensi lebih dari jumlah interval maka dibagi dua

  $a = 'A';
  $an = 1;

  $lInterval2 = $lInterval / 2;
  $j = 0;
  for ($i=0; $i < $tInterval ; $i++) {
    if ($frekuensi[$i] > $jInterval ) {
      // kondisi 2
      $d = [
        $data[$i][0],
        $data[$i][0]+$lInterval2,
        nilai_tengah($data[$i][0],$data[$i][0]+$lInterval2),
        $a.$an++
      ];
      $intFrekuensi [] = $d;
      // $intFrekuensi 1/2
      $d = [
        $intFrekuensi[$j][1],
        $data[$i][1],
        nilai_tengah($intFrekuensi[$j][1],$data[$i][1]),
        $a.$an++
      ];
      $intFrekuensi [] = $d;
      $j = $j + 2;
      // end kondisi 2
    }
    else{
      // kondisi 1
      $d = [
        $data[$i][0],
        $data[$i][1],
        nilai_tengah($data[$i][0],$data[$i][1]),
        $a.$an++
      ];
      $intFrekuensi [] = $d;
      // end kondisi 1
    }
  }
  return $intFrekuensi;
  // end interval berdasarkan frekuensi
}
// end menghitung interval
// fuzzyfikasi data
function fuzzyfikasi(){
$intFrekuensi = hitung_interval(); // interval berdasarkan frekuensi
$jIntFrekuensi = count(hitung_interval()); // jumlah unterval berdasarkan frekuensi
$data_aktual = data(); // data aktual
$jData_aktual = count(data()); // jumlah data aktual
for ($i=0; $i < $jData_aktual ; $i++) { // looping data aktual
  for ($j=0; $j < $jIntFrekuensi; $j++) { // looping data frekuensi
      $k = $j + 1; // A(n)
      if ($i == 0) { // no 1
        if ($data_aktual[$i]['hasil_panen'] >= $intFrekuensi[$j][0] && $data_aktual[$i]['hasil_panen'] <= $intFrekuensi[$j][1]) {
          $r = ['A','A'.$k]; // $r[kode kosong , A $k]
        }
      }
      else if ($data_aktual[$i]['hasil_panen'] >= $intFrekuensi[$j][0] && $data_aktual[$i]['hasil_panen'] <= $intFrekuensi[$j][1]) { // no 2 sampai n
        $l = $i-1;
        $r = [
          $relasi[$l][1],
          "A".$k
        ];
      }
    }
    $relasi [] = $r;
  }
  return $relasi;
}

// end fuzzyfikasi data
// fuzzy logic relasionship group
function flr(){
  $relasi = fuzzyfikasi();
  $jRelasi = count(fuzzyfikasi()); // 36
  $jIntFrekuensi = count(hitung_interval()); //9
  $array_kosong = true;
  // $array_bobot = true;

  // $group = [];

  for ($i=0; $i < $jIntFrekuensi ; $i++) {
    for ($j=0; $j < $jIntFrekuensi; $j++) {
      $a = $i+1;
      $b = $j+1;
      $m = 0;
      for ($k=1; $k < $jRelasi; $k++) {
        $n[0] = ['A'.$a,'A'.$b];
        if ($n[0] == $relasi[$k]) {
          $m = $m + 1;
          if ($array_kosong) {
            $group[] = $n[0];
            $array_kosong = false;
          }
          else{
            if (!in_array($n[0],$group)) {
              $group[] = $n[0];
            }
          }
        }

      }
      if ($m != 0) {
        // pembobotan
        $bobot[] = $m;
      }
      // end pembobotan
    }
  }

  // menggabungkan array harus menggunakan for ($group,bobot)

  return [$group,$bobot];
}
// end fuzzy logic relasionship group

// bobot ternormalisasi (Wn(t))
function bobot_ternormalisasi(){
    $group_bobot = flr(); // data gruop dan bobot
    $jGroup_bobot = count($group_bobot[0]); // jumlah data group dan bobot
    $jHitung_intervar = count(hitung_interval()); // jumlah intervar

    // menghiitung nilai bobot di masing-masing A1 sampai A(n)
    for ($i=0; $i < $jHitung_intervar ; $i++) {
      $b = $i+1;
      $a = 'A'.$b;
      $nilai = 0;
      for ($j=0; $j < $jGroup_bobot; $j++) {
        if ( $a == $group_bobot[0][$j][0] ) {
          $nilai =  $group_bobot[1][$j] + $nilai;
          $aNilai = [$a,$nilai];
        }
      }
      if ($nilai != 0) {
        $aNilai = [$a,$nilai];
        $a_array[] = $aNilai; // nilai bobot A1 sampai A(n)
      }
    }

    // end menghiitung nilai bobot di masing-masing A1 sampai A(n)

    for ($i=0; $i < $jHitung_intervar; $i++) { // 9
      $b = $i + 1;
      $a = 'A'.$b;
      // $m = 'M'.$b;
      for ($j=0; $j <$jGroup_bobot; $j++) { // 22
        if ($a == $group_bobot[0][$j][0]) {
          if ($a == $a_array[$i][0]) {

                // $nilaiss = $group_bobot[1][$j] / $a_array[$i][1];
            $bobotTernormalisasi[] = [$group_bobot[1][$j] / $a_array[$i][1],$a];
          }
        }
      }
    }
    return $bobotTernormalisasi;

  }
// end bobot ternormalisasi (Wn(t))

// menghitung nilai peramalan
// f1 sampai f(n) = (menghitung nilai peramalan)
  function menghitung_nilai_peramalan(){
  $jHitung_intervar = count(hitung_interval()); //9
  $hitung_interval = hitung_interval();

  $bobotTernormalisasi = bobot_ternormalisasi();
  $jBobotTernormalisasi = count(bobot_ternormalisasi()); //22

  $jFlr = count(flr()[0]); // 22
  $fls = flr()[0];


  for ($i=0; $i < $jHitung_intervar; $i++) {
    $b = $i + 1;
    $m = 'M'.$b;
    $a = 'A'.$b;
    $median[] = [$hitung_interval[$i][2],$m,$a]; // median atau nilai tengah
  }

  for ($i=0; $i < $jBobotTernormalisasi; $i++) {
    if ($fls[$i][0] === $bobotTernormalisasi[$i][1]) {
      $bobot_nilai[] = [
        $fls[$i][0],
        $fls[$i][1],
        $bobotTernormalisasi[$i][0]
      ];
    }
  }

$jBobot_nilai = count($bobot_nilai); // 22
$jMedian = count($median); // 9



for ($i=0; $i <$jMedian ; $i++) {
  $total_f_sementara = 0;
  $b = $i + 1;
  $a = 'A'.$b;
  $f = 'F'.$b;
  for ($j=0; $j <$jBobot_nilai ; $j++) {
    if ($a === $bobot_nilai[$j][0]) {
      for ($k=0; $k < $jMedian; $k++) {
        if ($bobot_nilai[$j][1] === $median[$k][2] ) {
          $f_sementara = $median[$k][0] * $bobot_nilai[$j][2];
        }
      } // end for k
      $total_f_sementara = $total_f_sementara + $f_sementara;
    }
  } // end for j
  $f_array[] = [$f,$total_f_sementara,$a];
} // end for i

return $f_array;
}
// end menghitung peramalan

// menentukan peramalan berdasarkan relasi/fuzzyfikasi
function peramalanBerdasarkanRelasi(){
  $data = data(); // data sementara

  $f = menghitung_nilai_peramalan(); // f = hitung peramalan
  $jF = count(menghitung_nilai_peramalan()); // jumlah (f = hitung peramalan)
  $fuzzyfikasi = fuzzyfikasi();
  $jFuzzyfikasi = count(fuzzyfikasi());
  $jhitung_interval = count(hitung_interval());
  $hitung_interval = hitung_interval();

  // var_dump($fuzzyfikasi[$jFuzzyfikasi-1][1]);
  // die;

// var_dump($jhitung_interval);
// die;
  for ($i=1; $i < $jFuzzyfikasi ; $i++) {
    for ($j=0; $j < $jF ; $j++) {
      if ($fuzzyfikasi[$i][1] == $f[$j][2]) {
        $peramalan[] = [
          $data[$i]['tanggal'],
          $data[$i]['hasil_panen'],
          $f[$j][1]
        ];
      }
    }
  }

// var_dump($fuzzyfikasi[$jFuzzyfikasi-1][1]);
// die;
// menentukan peramlan priode kedepan
  for ($i=0; $i <$jhitung_interval ; $i++) {
    if ($fuzzyfikasi[$jFuzzyfikasi-1][1] == $hitung_interval[$i][3]) {
      // echo $hitung_interval[$i][2];
      $peramalan[] = [
        'bulan kedepan',
        'hasil_panen',
        $hitung_interval[$i][2]
      ];
    }
  }
// end menentukan peramlan priode kedepan



  return $peramalan;
}
// end menentukan peramalan berdasarkan relasi/fuzzyfikasi

// end  metode fuzzy time series cheng------------------------------------------


function tampil($query){
  global $link;
  $result = mysqli_query($link,$query);
  while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
}


function tambah($data){
  global $link;
  $tanggal = $data['tanggal'];
  $tanggal = $tanggal.'-01';

  $hasil_panen = $data['hasil_panen'];


  mysqli_query($link,"INSERT INTO padi VALUES ('','$tanggal','$hasil_panen')");

  return mysqli_affected_rows($link);
}

function update($id,$data){
  global $link;
  $tanggal = $data['tanggal'];
  $tanggal = $tanggal.'-01';

  $hasil_panen = $data['hasil_panen'];

  $query = "UPDATE padi SET
  tanggal = '$tanggal',
  hasil_panen = '$hasil_panen'
  WHERE id = $id
  ";
  mysqli_query($link,$query);
  return mysqli_affected_rows($link);
}

function hapus($id){
  global $link;

  mysqli_query($link,"DELETE FROM padi WHERE id = $id");

  return mysqli_affected_rows($link);
}

function mape($aktual,$peramalan){
  $mape = (abs($aktual - $peramalan)/$aktual * 100);
  return number_format($mape,2);
}



// grafik
// y tanggal
function y_tanggal(){
  $data = data();
  $jdata  = count($data);

  $y = "[";
  for ($i=0; $i < $jdata-1 ; $i++) {
    $y = $y."'".$data[$i]['tanggal']."',";
  }
  $y = $y."'".$data[$jdata-1]['tanggal']."']";

  return $y;

}
// end grafik

// x
function x_nilai_01(){ // aktul
  $aktual = peramalanBerdasarkanRelasi();
  $jaktual = count($aktual);

  $data = data()[0]['hasil_panen'];


  $x = "['$data',";
  for ($i=0; $i < $jaktual-2 ; $i++) {
    $x = $x."'".$aktual[$i][1]."',";
  }
  $x = $x."'".$aktual[$jaktual-2][1]."']";

  return $x;
}

function x_nilai_02(){ // peramalan
  $peramalan = peramalanBerdasarkanRelasi();
  $jperamalan = count($peramalan);
  // return $peramalan;

  $x = "['0',";
  for ($i=0; $i < $jperamalan-2 ; $i++) {
    $x = $x."'".$peramalan[$i][2]."',";
  }
  $x = $x."'".$peramalan[$jperamalan-2][2]."',".$peramalan[$jperamalan-1][2]."]";

  return $x;
}




function sub_tgl($tanggal){
  $tanggal = substr($tanggal,0,7);
  return $tanggal;
}

//mencari nilai tengah
function nilai_tengah($min,$max){
  $selisi = $max - $min;
  $bagi = $selisi / 2;
  $median = $bagi + $min;
  return $median;
}
//end mencari nilai tengah
?>
