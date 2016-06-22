<?php
/*
$this->breadcrumbs=array(
	'Cotypes'=>array('index'),
	$model->idcotype,
);
*/
$this->menu=array(
	//array('label'=>'List Cotype','url'=>array('index')),
	array('label'=>'เพิ่ม','url'=>array('create')),
	array('label'=>'แก้ไข','url'=>array('update','id'=>$model->idcotype)),
	array('label'=>'ลบ','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idcotype),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'ประเภทความร่วมมือ','url'=>array('admin')),
);
?>

<h1>ข้อมูล #<?php echo $model->idcotype; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idcotype',
		'cotypename',
	),
)); ?>
