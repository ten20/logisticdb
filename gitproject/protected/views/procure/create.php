<?php
/*
$this->breadcrumbs=array(
	'Procures'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	//array('label'=>'List Procure','url'=>array('index')),
	array('label'=>'สรุปรายการจัดซื้อ','url'=>array('admin')),
);
?>

<h1>เพิ่มรายการ</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>