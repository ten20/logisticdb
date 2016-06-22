<?php


$this->menu=array(
	//array('label'=>'List Manual','url'=>array('index')),
	array('label'=>'เพิ่ม','url'=>array('create')),
	array('label'=>'แก้ไข','url'=>array('update','id'=>$model->idmanul)),
	array('label'=>'ลบ','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idmanul),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'รายการคู่มือ','url'=>array('admin')),
);
?>

<h1>ข้อมูล #<?php echo $model->idmanul; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idmanul',
		'description',
		'file',
		'createdate',
		'createby',
	),
)); ?>
