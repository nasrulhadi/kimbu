<h1>Data Survei Toko & Penjualan <?php echo Yii::app()->params['tahun']?></h1>
<table border="1" width="100%">
    <tr>
        <th>No</th>
        <th>Nama Toko</th>
        <th>Nama Pemilik</th>
        <th>Nama Toko</th>
        <th>Nama Toko</th>
        <th>Nama Toko</th>
    </tr>
    
    <tr>
    
   <?php
    $i=1;
    foreach($model->responDetails as $data)
    {
    ?>
        <td><?php echo $i;?></td>
        <td><?php echo $data->RESPON?></td>
    <?php
    $i++; }
    ?>
    </tr>
    
</table>