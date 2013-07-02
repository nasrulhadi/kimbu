<?php
$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Grafik'
);
?>

<h3 class="heading">Grafik Laporan</h3>

<div class="row-fluid">
    <div class="span12">
		<?php 
		
		$criteria = new CDbCriteria;
		
		
		
		$data = array();
		$x_axis = array();
		$list_user = User::model()->findAll();
		foreach($list_user as $user){
			$x_axis[] = $user->NAMA;
			 
		}
		
		
		
		?>
		<?php 
		$this->Widget('ext.highcharts.HighchartsWidget', array(
		   'options'=>array(
			  'chart'=> array('renderTo'=>'container',),
			  'title' => array('text' => 'Jumlah Survei Per Kategori Toko'),
			  'chart'    => array('type' =>'column'),
			  'xAxis' => array(
				 'categories' => $x_axis
			  ),
			  'yAxis' => array(
				 'title' => array('text' => 'Jumlah')
			  ),
			  'series' => array(
				 array('name' => 'Baru', 'data' => array(1,4,7,7,8,2,4)),
				 array('name' => 'Lama', 'data' => array(5,3,7,7,8,2,4,5,6,4)),
			  )
		   )
		));
		?>
    </div>
</div>
