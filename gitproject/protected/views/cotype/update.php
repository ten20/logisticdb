<?php
/*
$this->breadcrumbs=array(
	'Cotypes'=>array('index'),
	$model->idcotype=>array('view','id'=>$model->idcotype),
	'Update',
);
*/
$this->menu=array(
	//array('label'=>'List Cotype','url'=>array('index')),
	array('label'=>'เพิ่ม','url'=>array('create')),
	array('label'=>'แสดง','url'=>array('view','id'=>$model->idcotype)),
	array('label'=>'ประเภทความร่วมมือ','url'=>array('admin')),
);
?>

<h1>แก้ไข #<?php echo $model->idcotype; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>