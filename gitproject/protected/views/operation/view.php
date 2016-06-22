<?php
$this->breadcrumbs=array(
	'Operations'=>array('index'),
	$model->idoperation,
);

$this->menu=array(
	array('label'=>'List Operation','url'=>array('index')),
	array('label'=>'Create Operation','url'=>array('create')),
	array('label'=>'Update Operation','url'=>array('update','id'=>$model->idoperation)),
	array('label'=>'Delete Operation','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idoperation),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Operation','url'=>array('admin')),
);
?>

<h1>View Operation #<?php echo $model->idoperation; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idoperation',
		'oyear',
		'odate',
		'description',
		'file',
		'createdate',
		'createby',
	),
)); ?>
