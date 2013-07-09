<?php
$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Interaksi' => array('/interaksi/chat'),
    'Diskusi'
);

$dataProvider = new CActiveDataProvider('Chat', array(
            'criteria' => array(
                'condition' => 'STATUS = :status',
                'params' => array(':status' => 1),
                'order' => "ID_CHAT DESC",
            ),
            'pagination' => false,
        ));

$getListMsg = $dataProvider->getData();
?>

<h3 class="heading">Tempat Diskusi</h3>
<?php echo @Yii::app()->user->getFlash('info'); ?>
<div class="row-fluid">
    <div class="pull-right">
        <?php if (WebUser::isAdmin()) { ?>
                <ul class="ov_boxes pull-right">
                    <a href="<?php echo Yii::app()->createUrl('/interaksi/chat/create/'); ?>">
                        <li>
                            <div class="p_bar_up p_canvas" style="padding: 10px 14px 10px 4px;"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/chart-up.png"></div>
                            <div class="ov_text">
                                <strong style="color:#70A415">Buat Topik</strong>
                                <span style="color:#000000">diskusi antar user</span>
                            </div>
                        </li>
                    </a>
                </ul>
        <?php } ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <table class="table table-bordered table-striped table_vam" id="chatIndex">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Topik</th>
                    <th>Dibuat Tanggal</th>
                    <th>Diskusi Terakhir</th>
                    <th>Jumlah User</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $dataProvider,
                    'itemView' => '_index',
                    'template' => '{items}',
                ));
                ?>
            </tbody>
        </table>
    </div>
</div>