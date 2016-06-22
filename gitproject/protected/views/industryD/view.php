<?php
/*
$this->breadcrumbs=array(
	'Industry Ds'=>array('index'),
	$model->id,
);
*/

$this->menu=array(
	//array('label'=>'List IndustryD','url'=>array('index')),
	//array('label'=>'เพิ่ม','url'=>array('create')),
	array('label'=>'แก้ไข','url'=>array('update','id'=>$model->id)),
	//array('label'=>'ลบ','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),

	array('label'=>'รายละเอียด','url'=>array('admin')),
);
?>

<h1>ข้อมูล #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'industryhid',
		'industryh.title',
		'background',
		'objecttive',
		'about',
		'status',
	),
)); ?>
