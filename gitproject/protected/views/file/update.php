<?php
/*
$this->breadcrumbs=array(
	'Files'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
*/
$this->menu=array(
	//array('label'=>'List File','url'=>array('index')),
	array('label'=>'เพิ่ม','url'=>array('create')),
	//array('label'=>'View File','url'=>array('view','id'=>$model->id)),
	array('label'=>'รายการเอกสาร','url'=>array('admin')),
);
?>

<h1>แก้ไข #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>