<?php
/*
$this->breadcrumbs=array(
	'Cotypes'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	//array('label'=>'List Cotype','url'=>array('index')),
	array('label'=>'เพิ่ม','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cotype-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>ขั้นตอนจัดซื้อ/จ้าง</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'cotype-grid',
	'dataProvider'=>$model->search(),
	'summaryText'=>"กำลังแสดง {start}-{end} จากทั้งหมด {count} รายการ",
	'filter'=>$model,
	'columns'=>array(
		'idcotype',
		'cotypename',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
