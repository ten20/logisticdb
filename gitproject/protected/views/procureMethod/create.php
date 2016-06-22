<?php
/*
$this->breadcrumbs=array(
	'Procure Methods'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	//array('label'=>'List ProcureMethod','url'=>array('index')),
	array('label'=>'รายการวิธีจัดซื้อ','url'=>array('admin')),
);
?>

<h1>เพิ่มวิธีจัดซื้อ</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>