<?php
/*
$this->breadcrumbs=array(
	'Industry Hs'=>array('index'),
	'Create',
);
*/

$this->menu=array(
	//array('label'=>'List IndustryH','url'=>array('index')),
	array('label'=>'อุตสาหกรรมป้องกันประเทศฯ','url'=>array('admin')),
);
?>

<h1>เพิ่ม</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>