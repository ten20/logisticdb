<?php
/*
$this->breadcrumbs=array(
	'Procure Methods'=>array('index'),
	$model->idprocuremethod,
);
*/

$this->menu=array(
	//array('label'=>'List ProcureMethod','url'=>array('index')),
	array('label'=>'เพิ่ม','url'=>array('create')),
	array('label'=>'แก้ไข','url'=>array('update','id'=>$model->idprocuremethod)),
	array('label'=>'ลบ','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idprocuremethod),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'รายการวิธีจัดซื้อ','url'=>array('admin')),
);
?>

<h1>ข้อมูล #<?php echo $model->idprocuremethod; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idprocuremethod',
		'procuremethodname',
		'detail',
	),
)); ?>
