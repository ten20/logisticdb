<?php
$this->breadcrumbs=array(
	'Procure Methods',
);

$this->menu=array(
	array('label'=>'Create ProcureMethod','url'=>array('create')),
	array('label'=>'Manage ProcureMethod','url'=>array('admin')),
);
?>

<h1>Procure Methods</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
