<?php
/* @var $this TbluserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tblusers',
);

$this->menu=array(
	array('label'=>'Create Tbluser', 'url'=>array('create')),
	array('label'=>'Manage Tbluser', 'url'=>array('admin')),
);
?>

<h1>Tblusers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
