<?php
$this->breadcrumbs=array(
	'Cotypes',
);

$this->menu=array(
	array('label'=>'Create Cotype','url'=>array('create')),
	array('label'=>'Manage Cotype','url'=>array('admin')),
);
?>

<h1>Cotypes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
