<?php
/*
$this->breadcrumbs=array(
	'Industry Ds'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	//array('label'=>'List IndustryD','url'=>array('index')),
	array('label'=>'รายละเอียด','url'=>array('admin')),
);
?>

<h1>เพิ่ม</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>