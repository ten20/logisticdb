<?php
/*
$this->breadcrumbs=array(
	'Units'=>array('index'),
	$model->idunit=>array('view','id'=>$model->idunit),
	'Update',
);
*/
$this->menu=array(
	//array('label'=>'List Unit','url'=>array('index')),
	array('label'=>'เพิ่ม','url'=>array('create')),
	//array('label'=>'View Unit','url'=>array('view','id'=>$model->idunit)),
	array('label'=>'รายชื่อหน่วย','url'=>array('admin')),
);
?>

<h1>แก้ไข # <?php echo $model->idunit; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>