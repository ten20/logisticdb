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
	array('label'=>'ย้อนกลับ','url'=>array('/cologisticD/update/','id'=>$id)),
	array('label'=>'เพิ่มแผนการดำเนินการ','url'=>array('create','id'=>$id)),
);

?>

<h1>แผนการดำเนินการ</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'plan-grid',
	'dataProvider'=>$model->searchshow($id),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'planyear',
		'plandate',
		'plandetail',
		'planfile',
		'coid',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>