<?php
/*
$this->breadcrumbs=array(
	'Industry Ds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
*/
$this->menu=array(
	//array('label'=>'List IndustryD','url'=>array('index')),
	//array('label'=>'Create IndustryD','url'=>array('create')),
	//array('label'=>'View IndustryD','url'=>array('view','id'=>$model->id)),
	array('label'=>'รายละเอียด','url'=>array('admin')),
	array('label'=>'ย้อนกลับ','url'=>array('menu/menu01?title=คณะกรรมการพัฒนา และปฏิรูประบบงานด้านการส่งกำลังบำรุงของ สป.')),
);
?>

<h1>แก้ไข# <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>