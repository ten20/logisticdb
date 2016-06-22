<?php
/*
$this->breadcrumbs=array(
	'Industry Hs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
*/

$this->menu=array(
	//array('label'=>'List IndustryH','url'=>array('index')),
	//array('label'=>'เพิ่ม','url'=>array('create')),
	array('label'=>'แสดง','url'=>array('view','id'=>$model->id)),
	array('label'=>'ชื่อเรื่อง','url'=>array('admin')),
);
?>

<h1>แก้ไข# <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>