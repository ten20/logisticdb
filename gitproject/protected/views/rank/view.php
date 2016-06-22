<?php
$this->breadcrumbs=array(
	'Ranks'=>array('index'),
	$model->idrank,
);

$this->menu=array(
	array('label'=>'List Rank','url'=>array('index')),
	array('label'=>'Create Rank','url'=>array('create')),
	array('label'=>'Update Rank','url'=>array('update','id'=>$model->idrank)),
	array('label'=>'Delete Rank','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idrank),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Rank','url'=>array('admin')),
);
?>

<h1>View Rank #<?php echo $model->idrank; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idrank',
		'rank_fullname',
		'rank_shortname',
	),
)); ?>
