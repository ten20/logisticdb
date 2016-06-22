<?php
/*
$this->breadcrumbs=array(
	'Procures'=>array('index'),
	$model->idprocure=>array('view','id'=>$model->idprocure),
	'Update',
);
*/
$this->menu=array(
	//array('label'=>'List Procure','url'=>array('index')),
	array('label'=>'เพิ่มข้อมูล','url'=>array('create')),
	//array('label'=>'View Procure','url'=>array('view','id'=>$model->idprocure)),
	array('label'=>'สรุปรายการจัดซื้อ','url'=>array('admin')),
);
?>

<h1>แก้ไข # <?php echo $model->idprocure; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>