<?php
/*
$this->breadcrumbs=array(
	'Files'=>array('index'),
	'Manage',
);
*/
$id=$_GET['id'];

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

<h1>เอกสาร : <?php echo $cotypename; ?></h1>
<button class="btn btn-info" onclick="window.history.back();">Back</button>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'file-grid',
	'dataProvider'=>$model->searchshow($id),
	//'summaryText'=>"กำลังแสดง {start}-{end} จากทั้งหมด {count} รายการ",
	'summaryText'=>'',
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
/*
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
		*/
	),
)); ?>
