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
		
		
		
		$data = array();
		$x_axis = array();
		$list_user = User::model()->findAllByAttributes(array('TYPE'=>3));
		$id_pertanyaan = 8;
		$type = 3;
		$approval = 1;
		foreach($list_user as $user){
			$x_axis[] = $user->NAMA;
			$id_user = $user->ID_USER;
			
			$criteria = new CDbCriteria;
			$respon = '%1%';
			$criteria->join = 'JOIN respon ON respon.ID_USER = t.ID_USER JOIN respon_detail ON respon.ID_RESPON = respon_detail.ID_RESPON';
			$criteria->condition = 'ID_PERTANYAAN = :id_pertanyaan AND RESPON LIKE :respon AND TYPE = :type AND APPROVAL = :approval AND t.ID_USER = :id_user';
			$criteria->params = array('id_pertanyaan'=>$id_pertanyaan,'respon'=>$respon,'type'=>$type,'approval'=>$approval,'id_user'=>$id_user,);
			$criteria->select = 'COUNT(*) as COUNT';
			
			$count = User::model()->find($criteria)->COUNT;
			$data['lama'][] = (int)$count;
			
			$criteria = new CDbCriteria;
			$respon = '%2%';
			$criteria->join = 'JOIN respon ON respon.ID_USER = t.ID_USER JOIN respon_detail ON respon.ID_RESPON = respon_detail.ID_RESPON';
			$criteria->condition = 'ID_PERTANYAAN = :id_pertanyaan AND RESPON LIKE :respon AND TYPE = :type AND APPROVAL = :approval AND t.ID_USER = :id_user';
			$criteria->params = array('id_pertanyaan'=>$id_pertanyaan,'respon'=>$respon,'type'=>$type,'approval'=>$approval,'id_user'=>$id_user,);
			$criteria->select = 'COUNT(*) as COUNT';
			
			$count = User::model()->find($criteria)->COUNT;
			$data['baru'][] = (int) $count;
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
				 array('name' => 'Baru', 'data' =>$data['baru']),
				 array('name' => 'Lama', 'data' =>$data['lama']),
			  )
		   )
		));
		?>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
		<table>
			<tr>
				<td rowspan="2">
				</td>
				<td>
				Kategori Toko
				</td>
			</tr>			
			<tr>
				<td>
				Baru
				</td>
				<td>
				Lama
				</td>
			</tr>			
			<?php 
			$index = 0;
			foreach($list_user as $user){?>
			<tr>
				<td>
				<?php echo $user->NAMA; ?>
				</td>
				<td>
				<?php echo $data['baru'][$index]; ?>
				</td>
				<td>
				<?php echo $data['lama'][$index]; ?>
				</td>
			</tr>
			<?php 
			$index++;
			} ?>
		</table>
	</div>
</div>
