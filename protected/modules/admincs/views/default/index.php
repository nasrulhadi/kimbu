<?php

$this->pageTitle=Yii::app()->name . ' - Beranda';

$this->breadcrumbs = array(
    'Dashboard',
);
$baseUrl = Yii::app()->theme->baseUrl;
?>
<h3 class="heading">Dashboard</h3>
<div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Selamat datang!</strong> Anda dapat mengelola halaman Admnistrator Kimbu.
</div>

<div class="row-fluid">
    <div class="span12">
        <ul class="dshb_icoNav tac">
            <li><a href="javascript:void(0)" style="background-image: url(<?php echo $baseUrl; ?>/img/gCons/multi-agents.png)"><span class="label label-info">+10</span> Users</a></li>
            <li><a href="javascript:void(0)" style="background-image: url(<?php echo $baseUrl; ?>/img/gCons/world.png)">Map</a></li>
            <li><a href="javascript:void(0)" style="background-image: url(<?php echo $baseUrl; ?>/img/gCons/configuration.png)">Settings</a></li>
            <li><a href="javascript:void(0)" style="background-image: url(<?php echo $baseUrl; ?>/img/gCons/lab.png)">Lab</a>
            <li><a href="javascript:void(0)" style="background-image: url(<?php echo $baseUrl; ?>/img/gCons/van.png)"><span class="label label-success">$2851</span> Delivery</a></li>
        </ul>
    </div>
</div>