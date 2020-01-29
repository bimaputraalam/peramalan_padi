<?php
include '../function/function_metode.php';
// peramalan
$peramalan = peramalanBerdasarkanRelasi();
$jperamalan = count($peramalan);

// master data
$datas = count(data());

include '../templating/atas.php';
include '../templating/navigation_bar.php';

?>
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title text-center">Implementasi Logika Fuzzy Time Series Pada Peramalan Hasil Panen Tanaman Garut</h4>
        </div>
    </div>
</div>
<div class="row">
                    <div class="col-md-6 col-xl-6">
                        <div class="card-box tilebox-one">
                            <i class="icon-layers float-right text-muted"></i>
                            <h6 class="text-muted text-uppercase m-b-20">Hasil Peramalan Bulan Kedapan </h6>
                            <hr/>
                            <h2 class="m-b-20"><span data-plugin="counterup"> <?= $peramalan[$jperamalan-1][2] ?> </span> Kg</h2>
                            <span class="text-muted"><a href="peramalan.php"> Detail >> </a> </span>

                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="card-box tilebox-one">
                            <i class="fa fa-database float-right text-muted"></i>
                            <h6 class="text-muted text-uppercase m-b-20">Total Data</h6>
                            <hr/>
                            <h2 class="m-b-20"><span data-plugin="counterup"><?= $datas ?></span> Data</h2>
                              <span class="text-muted"><a href="master_data.php"> Detail >> </a> </span>
                        </div>
                    </div>
                </div>
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-12">
                    <div class="port text-center m-b-20">
                        <div class="portfolioContainer">

                            <div class="gallery-box creative photography natural">
                                <div class="thumb">
                                    <a href="../assets/images/tanaman/images8.jfif" class="image-popup" title="Screenshot-8">
                                        <img src="../assets/images/tanaman/images8.jfif" class="thumb-img"  height="300px" alt="work-thumbnail">
                                    </a>
                                    <div class="gal-detail">

                                    </div>
                                </div>
                            </div>

                            <div class="gallery-box personal photography">
                                <div class="thumb">
                                    <a href="../assets/images/tanaman/images4.jfif" class="image-popup" title="Screenshot-4">
                                        <img src="../assets/images/tanaman/images4.jfif" class="thumb-img"  height="300px" alt="work-thumbnail">
                                    </a>
                                    <div class="gal-detail">

                                    </div>
                                </div>
                            </div>
                            <div class="gallery-box personal photography creative">
                                <div class="thumb">
                                    <a href="../assets/images/tanaman/images7.jpg" class="image-popup" title="Screenshot-7">
                                        <img src="../assets/images/tanaman/images7.jpg" class="thumb-img"  height="300px" alt="work-thumbnail">
                                    </a>
                                    <div class="gal-detail">
                                    </div>
                                </div>
                            </div>
                            <div class="gallery-box natural photography">
                                <div class="thumb">
                                    <a href="../assets/images/tanaman/images6.jpg" class="image-popup" title="Screenshot-6">
                                        <img src="../assets/images/tanaman/images6.jpg" class="thumb-img"  height="300px" alt="work-thumbnail">
                                    </a>
                                    <div class="gal-detail">

                                    </div>
                                </div>
                            </div>
                            <div class="gallery-box creative photography">
                                <div class="thumb">
                                    <a href="../assets/images/tanaman/images5.jpg" class="image-popup" title="Screenshot-5">
                                        <img src="../assets/images/tanaman/images5.jpg" class="thumb-img"  height="300px" alt="work-thumbnail">
                                    </a>
                                    <div class="gal-detail">
                                    </div>
                                </div>
                            </div>
                             <div class="gallery-box natural personal">
                                <div class="thumb">
                                    <a href="../assets/images/tanaman/images1.jfif" class="image-popup" title="Screenshot-1">
                                        <img src="../assets/images/tanaman/images1.jfif" class="thumb-img"  height="300px" alt="work-thumbnail">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../templating/footer.php';
include '../templating/bawah.php';
?>
