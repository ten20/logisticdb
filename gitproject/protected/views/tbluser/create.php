<?php
/* @var $this TbluserController */
/* @var $model Tbluser */

$this->breadcrumbs=array(
	'Tblusers'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Tbluser', 'url'=>array('index')),
	array('label'=>'ข้อมูลผู้ใช้งาน', 'url'=>array('admin')),
);
?>

<h1>เพิ่มผู้ใช้งาน</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>