<?php
/*
$this->breadcrumbs=array(
	'Industryplans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
*/
$this->menu=array(
	//array('label'=>'List Industryplan','url'=>array('index')),
	//array('label'=>'เพิ่ม','url'=>array('create')),
	array('label'=>'เพิ่ม','url'=>array('create','id'=>$model->industrydid)),
	//array('label'=>'แสดง','url'=>array('view','id'=>$model->id)),
	//array('label'=>'รายการสาระสำคัญ','url'=>array('admin')),
	//array('label'=>'รายการสาระสำคัญ','url'=>array('adminshow')),
	array('label'=>'รายการสาระสำคัญ','url'=>array('adminshow','id'=>$model->industrydid)),
);
?>

<h1>แก้ไข # <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>