<?php
$this->breadcrumbs=array(
	'Flags'=>array('index'),
	$model->idflag,
);

$this->menu=array(
	array('label'=>'List Flag','url'=>array('index')),
	array('label'=>'Create Flag','url'=>array('create')),
	array('label'=>'Update Flag','url'=>array('update','id'=>$model->idflag)),
	array('label'=>'Delete Flag','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idflag),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Flag','url'=>array('admin')),
);
?>

<h1>View Flag #<?php echo $model->idflag; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idflag',
		'countryname_th',
		'countryname_en',
		'picture',
	),
)); ?>
