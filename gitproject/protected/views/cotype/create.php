<?php
/*
$this->breadcrumbs=array(
	'Cotypes'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	//array('label'=>'List Cotype','url'=>array('index')),
	array('label'=>'ขั้นตอนจัดซื้อ/จ้าง','url'=>array('admin')),
);
?>

<h1>เพิ่ม</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>