<?php
$this->breadcrumbs=array(
	'Flags',
);

$this->menu=array(
	array('label'=>'Create Flag','url'=>array('create')),
	array('label'=>'Manage Flag','url'=>array('admin')),
);
?>

<h1>Flags</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
