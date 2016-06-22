<?php
/*
$this->breadcrumbs=array(
	'Operations'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	//array('label'=>'List Operation','url'=>array('index')),
	array('label'=>'Create Operation','url'=>array('create')),
);
?>
<hr/><p align="right"><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/administration/index" class="btn btn-primary">Back</a></p>
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('operation-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>ตารางการปฏิบัติงานประจำปี</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'operation-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'idoperation',
		'oyear',
		'odate',
		'description',
		'file',
		/*'createdate',		
		'createby',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
