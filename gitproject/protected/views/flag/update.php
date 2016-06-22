<?php
$this->breadcrumbs=array(
	'Flags'=>array('index'),
	$model->idflag=>array('view','id'=>$model->idflag),
	'Update',
);

$this->menu=array(
	array('label'=>'List Flag','url'=>array('index')),
	array('label'=>'Create Flag','url'=>array('create')),
	array('label'=>'View Flag','url'=>array('view','id'=>$model->idflag)),
	array('label'=>'Manage Flag','url'=>array('admin')),
);
?>

<h1>Update Flag <?php echo $model->idflag; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>