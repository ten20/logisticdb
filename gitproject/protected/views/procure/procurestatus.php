<?php
/*
$this->breadcrumbs=array(
	'Procures'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	//array('label'=>'List Procure','url'=>array('index')),
	//array('label'=>'กลับหน้าสรุป','url'=>array('procure/report')),
//	array('label'=>'เพิ่มข้อมูล','url'=>array('create')),
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
<?php 
//print_r($_GET); 
//$id=$_GET['id'];
$procurestatus='';
$unitname='';
$budgetyear=substr(date("Y")+543,-2);
if(isset($_GET['budgetyear']))
$budgetyear=$_GET['budgetyear'];

if(isset($_GET['procurestatus']))
$procurestatus=$_GET['procurestatus'];
if(isset($_GET['unitname']))
$unitname=$_GET['unitname'];
$showunitname=$unitname;
if(empty($unitname))
	$showunitname="รวม";
//return;
//return;
$header=$showunitname.':'.$procurestatus;
if(empty($procurestatus))
$header=$unitname.':'.'รมว.กห.อนุมัติแล้ว';
if(empty($procurestatus) && empty($unitname))
$header="รายการจัดซื้อ/จ้างที่รายงาน รมว.กห.";

?>
<h3><?php echo $header ?></h3>
<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/procure/report" class="btn btn-info">กลับหน้าสรุป</a>

<?php //echo CHtml::link('ค้นหา','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'procure-grid',
	'dataProvider'=>$model->searchprocurestatus($budgetyear,$procurestatus,$unitname),
	'summaryText'=>"กำลังแสดง {start}-{end} จากทั้งหมด {count} รายการ",
	'htmlOptions' => array('class'=>'table table-striped table-bordered table-hover'),
	'rowCssClassExpression'=>'  ( $row%2 ? \'warning\' : \'info\' ) ',
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
		'saler',
		'product',
		'country',
		/*
		'period',
		'editor',
		'remark',
		'file',
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
		*/
	),
)); ?>
