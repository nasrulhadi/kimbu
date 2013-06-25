<?php

$this->pageTitle=Yii::app()->name . ' - Beranda';

$this->breadcrumbs = array(
    'Dashboard',
);
$baseUrl = Yii::app()->theme->baseUrl;
$siteUrl = Yii::app()->baseUrl;
?>
<h3 class="heading">Hai <?php echo Yii::app()->user->name; ?>, Selamat Datang Kembali :)</h3>
<?php 
$getDivisi = Perusahaan::model()->findByPk(Yii::app()->user->idDivisi);
$getPerusahaan = Perusahaan::model()->findByPk($getDivisi->ID_PERUSAHAAN);
?>
<div class="row-fluid">
    <div class="span12">
        <div class="dshb_icoNav tac" style="margin-bottom: 30px;">
            <?php if($getPerusahaan->LOGO != "" && $getPerusahaan->LOGO != NULL && $getPerusahaan->LOGO != "tidakadalogo.jpg"){ ?>
            <img src="<?php echo $siteUrl."/file/logo/perusahaan/".$getPerusahaan->LOGO ?>" class="" style="width:300px;" align="middle" alt="<?php echo $getPerusahaan->NAMA; ?>">
            <?php } ?>
        </div>
        <ul class="dshb_icoNav tac">
            <li><a href="./client/grafik" style="background-image: url(<?php echo $baseUrl; ?>/img/gCons/bar-chart.png)">Grafik</a></li>
            <li><a href="./client/survei" style="background-image: url(<?php echo $baseUrl; ?>/img/gCons/add-item.png)">Survei Toko</a></li>
            <li><a href="./client/surveipublik" style="background-image: url(<?php echo $baseUrl; ?>/img/gCons/next-item.png)">Survei Publik</a></li>
        </ul>
    </div>
</div>