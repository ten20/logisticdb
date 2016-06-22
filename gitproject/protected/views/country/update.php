<?php
/*
$this->breadcrumbs=array(
	'Countries'=>array('index'),
	$model->idcountry=>array('view','id'=>$model->idcountry),
	'Update',
);
*/

$this->menu=array(
	//array('label'=>'List Country','url'=>array('index')),
	array('label'=>'เพิ่ม','url'=>array('create')),
	//array('label'=>'View Country','url'=>array('view','id'=>$model->idcountry)),
	array('label'=>'รายชื่อประเทศ','url'=>array('admin')),
);
?>

<h1>แก้ไข #<?php echo $model->idcountry; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>