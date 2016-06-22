<?php
/*
$this->breadcrumbs=array(
	'Units'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	//array('label'=>'List Unit','url'=>array('index')),
	array('label'=>'เพิ่ม','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('unit-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>หน่วยงาน</h1>



<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'unit-grid',
	'dataProvider'=>$model->search(),
	'summaryText'=>"กำลังแสดง {start}-{end} จากทั้งหมด {count} รายการ",
	'filter'=>$model,
	'columns'=>array(
		'idunit',
		'unitname',
		'detail',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
