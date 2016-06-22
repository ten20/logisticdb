<?php
/*
$this->breadcrumbs=array(
	'Files'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	//array('label'=>'List File','url'=>array('index')),
	array('label'=>'เพิ่มเอกสาร','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('file-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>รายการเอกสาร</h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'file-grid',
	'dataProvider'=>$model->search(),
	'summaryText'=>"กำลังแสดง {start}-{end} จากทั้งหมด {count} รายการ",
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'co.cotypename',
		'title',
		//'filename',
		array('name'=>'filename',
			'type'=>'html',
			'value'=>'CHtml::link("$data->filename",Yii::app()->request->baseUrl."/uploadfiles/".$data->filename)'),
		//'coid',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
