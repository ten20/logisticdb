<?php
/*
$this->breadcrumbs=array(
	'Procure Methods'=>array('index'),
	$model->idprocuremethod=>array('view','id'=>$model->idprocuremethod),
	'Update',
);
*/
$this->menu=array(
	//array('label'=>'List ProcureMethod','url'=>array('index')),
	array('label'=>'เพิ่ม','url'=>array('create')),
	//array('label'=>'View ProcureMethod','url'=>array('view','id'=>$model->idprocuremethod)),
	array('label'=>'รายการวิธีจัดซื้อ','url'=>array('admin')),
);
?>

<h1>แก้ไข #<?php echo $model->idprocuremethod; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>