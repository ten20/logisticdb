<?php
/* @var $this TbluserController */
/* @var $model Tbluser */
/*
$this->breadcrumbs=array(
	'Tblusers'=>array('index'),
	$model->user_id=>array('view','id'=>$model->user_id),
	'Update',
);
*/
$this->menu=array(
	//array('label'=>'List Tbluser', 'url'=>array('index')),
	//array('label'=>'เพิ่มผู้ใช้งาน', 'url'=>array('create')),
	//array('label'=>'View Tbluser', 'url'=>array('view', 'id'=>$model->user_id)),
	//array('label'=>'ข้อมูลผู้ใช้งาน', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลส่วนตัว #<?php echo $model->user_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>