<?php

$this->menu=array(
	//array('label'=>'List Manual','url'=>array('index')),
	array('label'=>'เพิ่ม','url'=>array('create')),
	//array('label'=>'View Manual','url'=>array('view','id'=>$model->idmanul)),
	array('label'=>'รายการกฏ ระเบียบ คำสั่ง','url'=>array('admin')),
);
?>

<h1>แก้ไข # <?php echo $model->idmanul; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>