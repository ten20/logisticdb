<?php
/*
$this->breadcrumbs=array(
	'Industry Ds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
*/
//echo $id;
$menureturn="menu/menu01";
if($id==1){
$menureturn="menu/menu01";
}
if($id==2 || $id==3){
$menureturn="menu/menu02";
}
if($id==4 || $id==5){
$menureturn="menu/menu03";
}
$this->menu=array(
	//array('label'=>'List IndustryD','url'=>array('index')),
	//array('label'=>'Create IndustryD','url'=>array('create')),
	//array('label'=>'View IndustryD','url'=>array('view','id'=>$model->id)),
	//array('label'=>'รายละเอียด','url'=>array('admin')),
	//array('label'=>'ย้อนกลับ','url'=>array('menu/menu01')),
	array('label'=>'ย้อนกลับ','url'=>array($menureturn)),
	//echo $menureturn;
);
?>
<div style="border-style: solid;  border-color: green;" class="alert alert-success" >
<h1><?php echo $model->industryh->title; ?></h1>

<?php echo $this->renderPartial('_formshow',array('model'=>$model)); ?>
</div>
<hr/><p align="right"><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/menu" class="btn btn-primary">Back</a></p>