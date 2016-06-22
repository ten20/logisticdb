<?php
/* @var $this RegisterOwnerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Register Owners',
);

$this->menu=array(
	array('label'=>'Create RegisterOwner', 'url'=>array('create')),
	array('label'=>'Manage RegisterOwner', 'url'=>array('admin')),
);
?>

<h1>Register Owners</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
