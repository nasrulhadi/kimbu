<?php
/* @var $this ProfileController */
/* @var $model User */

$this->breadcrumbs=array(
    'Profile'=>array('index'),
    'Edit Profile',
);
?>

<h3 class="heading">Edit Profile</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>