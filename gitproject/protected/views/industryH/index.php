<?php
$this->breadcrumbs=array(
	'Industry Hs',
);

$this->menu=array(
	array('label'=>'Create IndustryH','url'=>array('create')),
	array('label'=>'Manage IndustryH','url'=>array('admin')),
);
?>

<h1>Industry Hs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
