<?php
$this->breadcrumbs=array(
	'Procures',
);

$this->menu=array(
	array('label'=>'Create Procure','url'=>array('create')),
	array('label'=>'Manage Procure','url'=>array('admin')),
);
?>

<h1>Procures</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
