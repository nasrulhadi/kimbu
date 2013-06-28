<?php
$this->pageTitle = Yii::app()->name . ' - Detil Survei';

$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Survei' => array('/survei'),
    'Detail'
);

$spanHeading = "span12";

if(WebUser::isAdmin()){
    $conditions = "ID_SURVEI = :idSurvei AND APPROVAL <> 2";
    $params = array(':idSurvei' => $model->ID_SURVEI);
} elseif (WebUser::isSurveyor()) {
    $conditions = "ID_SURVEI = :idSurvei AND APPROVAL <> 2 AND ID_USER = :idSurveyor";
    $params = array(':idSurvei' => $model->ID_SURVEI, ':idSurveyor' => Yii::app()->user->idUser);
    $spanHeading = "span8";
} elseif ((WebUser::isClient())) {
    $conditions = "ID_SURVEI = :idSurvei AND APPROVAL = 1";
    $params = array(':idSurvei' => $model->ID_SURVEI);
} else {
    $this->redirect('/site/logout');
}

$dataProvider = new CActiveDataProvider('Respon', array(
    'criteria' => array(
        'condition' => $conditions,
        'params' => $params,
        'order' => 'ID_RESPON DESC',
    ),
    'pagination' => false,
        ));

$getListMsg = $dataProvider->getData();
?>

<h3 class="heading">Detail Survei Toko & Penjualan</h3>

<div class="row-fluid" style="margin-bottom: 20px;">
    <div class="<?php echo $spanHeading; ?> pull-left">
        <table class="table table-bordered table-striped" id="user">
            <tbody> 
                <tr>         
                    <td width="20%">Nama Survei</td>
                    <td><strong><?php echo $model->iDRESPON->NAMA_SURVEI; ?></strong></td>
                </tr>
                <tr>         
                    <td>Keterangan</td>
                    <td><strong><?php echo $model->iDRESPON->KETERANGAN; ?></strong></td>
                </tr>                     
            </tbody>
        </table>
    </div>
    <?php if(WebUser::isSurveyor()){ ?>
    <div class="span4">
        <ul class="ov_boxes pull-right">
            <a href="<?php echo Yii::app()->createUrl('/survei/input/' . $model->ID_SURVEI); ?>">
                <li>
                    <div class="p_bar_up p_canvas" style="padding: 10px 14px 10px 4px;"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/chart-up.png"></div>
                    <div class="ov_text">
                        <strong style="color:#70A415">Mulai Survei</strong>
                        <span style="color:#000000">toko dan penjualan</span>
                    </div>
                </li>
            </a>
        </ul>
    </div>
    <?php } ?>
</div>
<div class="row-fluid">
    <div class="span12">
        <table class="table table-bordered table-striped table_vam" id="surveiDetail">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Toko</th>
                    <th>Surveyor</th>
                    <th>Tanggal Pengisian</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $dataProvider,
                    'itemView' => '_detail',
                    'template' => '{items}',
                    'emptyText' => '',
                ));
                ?>
            </tbody>
        </table>
    </div>
</div>

