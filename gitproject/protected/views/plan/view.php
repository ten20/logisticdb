<?php
/*
$this->breadcrumbs=array(
	'Plans'=>array('index'),
	$model->id,
);
*/
$this->menu=array(
	//array('label'=>'List Plan','url'=>array('index')),
	//array('label'=>'เพิ่ม','url'=>array('create')),
	array('label'=>'รายการการดำเนินการ','url'=>array('create','id'=>$model->coid)),
	array('label'=>'แก้ไข','url'=>array('update','id'=>$model->id)),
	array('label'=>'ลบ','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Plan','url'=>array('admin')),
	array('label'=>'รายการการดำเนินการ','url'=>array('adminshow','id'=>$model->coid)),
);
?>

<h1>ข้อมูลการดำเนินการ #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'planyear',
		'plandate',
		'plandetail',
		'planfile',
		'coid',
	),
)); ?>
