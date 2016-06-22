<?php
/*
$this->breadcrumbs=array(
	'Manuals'=>array('index'),
	'Manage',
);
*/
/*
$this->menu=array(
	//array('label'=>'List Manual','url'=>array('index')),
	array('label'=>'เพิ่ม','url'=>array('create')),
);
*/
?>
<hr/><p align="right"><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/menu/menu01?title=คณะกรรมการพัฒนา และปฏิรูประบบงานด้านการส่งกำลังบำรุงของ สป." class="btn btn-primary">Back</a></p>
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('manual-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="alert alert-success">
<h1> กฏ ระเบียบ คำสั่ง ที่เกี่ยวข้อง</h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'manual-grid',
	'dataProvider'=>$model->search(),
	'summaryText'=>"กำลังแสดง {start}-{end} จากทั้งหมด {count} รายการ",	
	'htmlOptions' => array('class'=>'table table-striped table-bordered table-hover'),
	'rowCssClassExpression'=>'  ( $row%2 ? \'warning\' : \'info\' ) ',
	'filter'=>$model,
	'columns'=>array(
		//'idmanul',
		'description',
		//'file',
		array('name'=>'file',
			'type'=>'raw',
			//'value'=>'$data->file'
			'value'=>'CHtml::link("$data->file", "http://" . $_SERVER["SERVER_NAME"] . Yii::app()->request->baseUrl . "/documents/" . $data->file)'),		
		//'createdate',
		//'createby',
		/*array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
		*/
	),
)); ?>
</div>