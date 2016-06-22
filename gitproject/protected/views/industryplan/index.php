<?php
$this->breadcrumbs=array(
	'Industryplans',
);

$this->menu=array(
	array('label'=>'Create Industryplan','url'=>array('create')),
	array('label'=>'Manage Industryplan','url'=>array('admin')),
);
?>

<h1>Industryplans</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
