<?php
/* @var $this TbluserController */
/* @var $model Tbluser */

$this->breadcrumbs=array(
	'Tblusers'=>array('index'),
	$model->user_id,
);

$this->menu=array(
	//array('label'=>'List Tbluser', 'url'=>array('index')),
	//array('label'=>'เพิ่มผู้ใช้งาน', 'url'=>array('create')),
	array('label'=>'แก้ไขผู้ใช้งาน', 'url'=>array('updateme', 'id'=>$model->user_id)),
	//array('label'=>'Delete Tbluser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'ข้อมูลผู้ใช้งาน', 'url'=>array('admin')),
);
?>

<h1>รายละเอียดผู้ใช้งาน #<?php echo $model->user_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user_id',
		'user_name',
		'user_pwd',
		'pre_name',
		'first_name',
		'last_name',
		'department',
		'email',
		'tel',
		'position',
		'created',
		'modified',
		'user_level',
		'last_login',
		'count_visit',
	),
)); ?>
