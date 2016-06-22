<?php
/*
$this->breadcrumbs=array(
	'Files'=>array('index'),
	'Create',
);
*/
//echo "id=".$id;
$this->menu=array(
	//array('label'=>'List File','url'=>array('index')),
//	array('label'=>'รายการเอกสาร','url'=>array("file/adminshow/$id")),
	array('label'=>'รายการเอกสาร','url'=>array("file/admin")),
);
?>

<h1>เพิ่มเอกสาร</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'id'=>$id)); ?>