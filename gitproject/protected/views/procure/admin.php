<?php
/*
$this->breadcrumbs=array(
	'Procures'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	//array('label'=>'List Procure','url'=>array('index')),
	array('label'=>'เพิ่มข้อมูล','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('procure-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>รายการจัดซื้อจัดจ้าง</h3>

<?php echo CHtml::link('ค้นหา','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'procure-grid',
	'dataProvider'=>$model->search(),
	'summaryText'=>"กำลังแสดง {start}-{end} จากทั้งหมด {count} รายการ",
	'filter'=>$model,
	'columns'=>array(
		//'idprocure',
		'unitname',
		'description',
		'budgetyear',
		'method',
		//'budget',
		array('name'=>'budget',
			'type'=>'raw',
			'value'=>'Yii::app()->format->formatNumber($data->budget)',
			),
		'procure_status',
		'approvedate',
		/*
		'saler',
		'product',
		'country',
		'period',
		'editor',
		'remark',
		'file',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
