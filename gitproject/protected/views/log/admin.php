<?php
$this->breadcrumbs=array(
	'Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Log','url'=>array('index')),
	//array('label'=>'Create Log','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('log-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Logs</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'log-grid',
	'summaryText'=>"แสดง {start}-{end} จากทั้งหมด {count} รายการ",
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'log_id',
		'username',
		'url_address',
		'ip_address',
		'log_type',
		'log_date',		
		'log_fulltext',
		/*
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
		*/
	),
)); ?>
