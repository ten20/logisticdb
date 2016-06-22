<?php
/*
$this->breadcrumbs=array(
	'Industryplans'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	//array('label'=>'List Industryplan','url'=>array('index')),
	array('label'=>'รายการสาระสำคัญ','url'=>array("industryplan/adminshow/$id")),

);
?>

<h1>เพิ่มสรุปสาระสำคัญ </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'id'=>$id)); ?>