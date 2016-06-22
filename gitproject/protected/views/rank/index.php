<?php
$this->breadcrumbs=array(
	'Ranks',
);

$this->menu=array(
	array('label'=>'Create Rank','url'=>array('create')),
	array('label'=>'Manage Rank','url'=>array('admin')),
);
?>

<h1>Ranks</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
