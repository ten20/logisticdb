<?php
/*
$this->breadcrumbs=array(
	'Industry Hs'=>array('index'),
	$model->title,
);
*/
$this->menu=array(
	//array('label'=>'List IndustryH','url'=>array('index')),
	//array('label'=>'เพิ่ม','url'=>array('create')),
	array('label'=>'แก้ไข','url'=>array('update','id'=>$model->id)),
	//array('label'=>'ลบ','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'ชื่อเรื่อง','url'=>array('admin')),
);
?>

<h1>ข้อมูล #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
	),
)); ?>
