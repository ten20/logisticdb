<?php
/*
$this->breadcrumbs=array(
	'Countries'=>array('index'),
	$model->idcountry,
);
*/
$this->menu=array(
	//array('label'=>'List Country','url'=>array('index')),
	array('label'=>'เพิ่ม','url'=>array('create')),
	array('label'=>'แก้ไข','url'=>array('update','id'=>$model->idcountry)),
	array('label'=>'ลบ','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idcountry),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'รายชื่อประเทศ','url'=>array('admin')),
);
?>

<h1>ประเทศ #<?php echo $model->idcountry; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idcountry',
		'countryname_th',
		'countryname_en',
		'picture',
	),
)); ?>
