<?php
/*
$this->breadcrumbs=array(
	'Industryplans'=>array('index'),
	$model->id,
);
*/
$id=$_GET['id'];
$this->menu=array(
	//array('label'=>'List Industryplan','url'=>array('index')),
	array('label'=>'เพิ่ม','url'=>array("industryplan/create/$model->industrydid")),
	array('label'=>'ลบ','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'รายการสาระสำคัญ','url'=>array('adminshow','id'=>$model->industrydid)),

);
?>

<h1>ข้อมูลสาระสำคัญ #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'industrydid',
		//'industryd.industryh.title',
		'planyear',
		'plandate',
		'plandetail',
		'planfile',

	),
)); ?>
