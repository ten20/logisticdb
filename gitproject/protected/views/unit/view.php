<?php
/*
$this->breadcrumbs=array(
	'Units'=>array('index'),
	$model->idunit,
);
*/
$this->menu=array(
	//array('label'=>'List Unit','url'=>array('index')),
	array('label'=>'เพิ่ม','url'=>array('create')),
	array('label'=>'แก้ไข','url'=>array('update','id'=>$model->idunit)),
	array('label'=>'ลบ','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idunit),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'รายชื่อหน่วย','url'=>array('admin')),
);
?>

<h1>ข้อมูลหน่วย #<?php echo $model->idunit; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idunit',
		'unitname',
		'detail',
	),
)); ?>
