<?php
/* @var $this RegisterOwnerController */
/* @var $model RegisterOwner */

$this->breadcrumbs=array(
	'Register Owners'=>array('index'),
	$model->owner_id,
);

$this->menu=array(
	//array('label'=>'List RegisterOwner', 'url'=>array('index')),
	//array('label'=>'Create RegisterOwner', 'url'=>array('create')),
	array('label'=>'แก้ไขหน่วยผู้ใช้งาน', 'url'=>array('update', 'id'=>$model->owner_id)),
//	array('label'=>'Delete RegisterOwner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->owner_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'ข้อมูลหน่วยผู้ใช้งาน', 'url'=>array('admin')),
);
?>

<h1>ข้อมูลหน่วยผู้ใช้งาน #<?php echo $model->owner_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'owner_id',
		'owner_fullname',
		'owner_shortname',
	),
)); ?>
