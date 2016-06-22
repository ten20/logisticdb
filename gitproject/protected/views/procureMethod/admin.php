<?php
/*
$this->breadcrumbs=array(
	'Procure Methods'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	//array('label'=>'List ProcureMethod','url'=>array('index')),
	array('label'=>'เพิ่มวิธีจัดซื้อ','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('procure-method-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>รายการวิธีจัดซื้อ</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'procure-method-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idprocuremethod',
		'procuremethodname',
		'detail',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
