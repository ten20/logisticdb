<?php
$this->breadcrumbs=array(
	'Flags'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Flag','url'=>array('index')),
	array('label'=>'Manage Flag','url'=>array('admin')),
);
?>

<h1>Create Flag</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>