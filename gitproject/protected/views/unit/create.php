<?php
/*
$this->breadcrumbs=array(
	'Units'=>array('index'),
	'Create',
);
*/

$this->menu=array(
	//('label'=>'List Unit','url'=>array('index')),
	array('label'=>'รายชื่อหน่วย','url'=>array('admin')),
);
?>

<h1>เพิ่มหน่วยงาน</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>