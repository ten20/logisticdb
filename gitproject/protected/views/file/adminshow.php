<?php
/*
$this->breadcrumbs=array(
	'Files'=>array('index'),
	'Manage',
);
*/
$id=$_GET['id'];
$this->menu=array(
	//array('label'=>'List File','url'=>array('index')),
	//	array('label'=>'ย้อนกลับ','url'=>array('/cologisticD/update/','id'=>$id)),
	array('label'=>'เพิ่มเอกสาร','url'=>array('create','id'=>$id)),
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
	'dataProvider'=>$model->searchshow($id),
	'summaryText'=>"กำลังแสดง {start}-{end} จากทั้งหมด {count} รายการ",
	'htmlOptions' => array('class'=>'table table-striped table-bordered table-hover'),
	'rowCssClassExpression'=>'  ( $row%2 ? \'warning\' : \'info\' ) ',
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'coid',
		//'co.cologistich.title',
		'title',
		//'filename',
		array('name'=>'filename',
			'type'=>'html',
			'value'=>'CHtml::link("$data->filename",Yii::app()->request->baseUrl."/uploadfiles/".$data->filename)'),

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
