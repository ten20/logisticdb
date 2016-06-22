<?php
/*
$this->breadcrumbs=array(
	'Files'=>array('index'),
	$model->title,
);
*/
/*
$this->menu=array(
	array('label'=>'List File','url'=>array('index')),
	array('label'=>'Create File','url'=>array('create')),
	array('label'=>'Update File','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete File','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage File','url'=>array('admin')),
);
*/
?>

<h1>เอกสาร#<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
		'co.cotypename',
		'title',
		//'filename',
		array('name'=>'filename',
			'type'=>'raw',
			'value'=>CHtml::link("$model->filename",Yii::app()->request->baseUrl."/uploadfiles/".$model->filename)),

		//'coid',
	),
)); ?>
