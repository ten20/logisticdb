<?php
$this->breadcrumbs=array(
	'Manuals',
);

$this->menu=array(
	array('label'=>'Create Manual','url'=>array('create')),
	array('label'=>'Manage Manual','url'=>array('admin')),
);
?>

<h1>Manuals</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
