<?php
/*
$this->breadcrumbs=array(
	'Plans'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	//array('label'=>'List Plan','url'=>array('index')),
	//array('label'=>'รายการแผน','url'=>array('admin')),
	array('label'=>'รายการแผนการดำเนินการ','url'=>array("plan/adminshow/$id")),

);
?>

<h1>เพิ่มแผนการดำเนินการ</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'id'=>$id)); ?>