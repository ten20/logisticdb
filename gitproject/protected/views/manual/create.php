<?php
/*
$this->breadcrumbs=array(
	'Manuals'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	//array('label'=>'List Manual','url'=>array('index')),
	array('label'=>'กฏ ระเบียบ คำสั่ง','url'=>array('admin')),
);
?>

<h1>เพิ่ม</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>