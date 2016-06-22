<?php
$this->breadcrumbs=array(
	'Ranks'=>array('index'),
	$model->idrank=>array('view','id'=>$model->idrank),
	'Update',
);

$this->menu=array(
	array('label'=>'List Rank','url'=>array('index')),
	array('label'=>'Create Rank','url'=>array('create')),
	array('label'=>'View Rank','url'=>array('view','id'=>$model->idrank)),
	array('label'=>'Manage Rank','url'=>array('admin')),
);
?>

<h1>Update Rank <?php echo $model->idrank; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>