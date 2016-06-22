<?php
/* @var $this RegisterOwnerController */
/* @var $model RegisterOwner */

$this->breadcrumbs=array(
	'Register Owners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RegisterOwner', 'url'=>array('index')),
	array('label'=>'Manage RegisterOwner', 'url'=>array('admin')),
);
?>

<h1>Create RegisterOwner</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>