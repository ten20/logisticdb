<?php
/*
$this->breadcrumbs=array(
	'Industry Ds'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	//array('label'=>'List IndustryD','url'=>array('index')),
	//array('label'=>'เพิ่ม','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('industry-d-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>รายละเอียด</h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'industry-d-grid',
	'dataProvider'=>$model->search(),
	'summaryText'=>"กำลังแสดง {start}-{end} จากทั้งหมด {count} รายการ",
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'industryhid',
		'industryh.title',
		'background',
		'objecttive',
		'about',
		//'status',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
