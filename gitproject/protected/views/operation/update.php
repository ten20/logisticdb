<?php
$this->breadcrumbs=array(
	'Operations'=>array('index'),
	$model->idoperation=>array('view','id'=>$model->idoperation),
	'Update',
);

$this->menu=array(
	array('label'=>'List Operation','url'=>array('index')),
	array('label'=>'Create Operation','url'=>array('create')),
	array('label'=>'View Operation','url'=>array('view','id'=>$model->idoperation)),
	array('label'=>'Manage Operation','url'=>array('admin')),
);
?>

<h1>Update Operation <?php echo $model->idoperation; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>