<?php
$this->breadcrumbs=array(
	'Industry Ds',
);

$this->menu=array(
	array('label'=>'Create IndustryD','url'=>array('create')),
	array('label'=>'Manage IndustryD','url'=>array('admin')),
);
?>

<h1>Industry Ds</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
