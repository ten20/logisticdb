<?php
/*
$this->breadcrumbs=array(
	'Plans'=>array('index'),
	'Manage',
);
*/

$id=$_GET['id'];
$this->menu=array(
	//array('label'=>'List File','url'=>array('index')),
	array('label'=>'ย้อนกลับ','url'=>array('/industryD/update/','id'=>$id)),
	array('label'=>'เพิ่มสาระสำคัญ','url'=>array('create','id'=>$id)),
);

?>

<h1>สรุปสาระสำคัญ</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'industryplan-grid',
	'dataProvider'=>$model->searchshow($id),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'industrydid',
		//'industryd.industryh.title',
		'planyear',
		'plandate',
		'plandetail',
		'planfile',

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>