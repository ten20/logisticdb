<?php
/*
$this->breadcrumbs=array(
	'Procures'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	//array('label'=>'List Procure','url'=>array('index')),
	array('label'=>'กลับหน้าสรุป','url'=>array('procure/report')),
	//array('label'=>'เพิ่มข้อมูล','url'=>array('create')),
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
$procuretype='';
$unitname='';
if(isset($_GET['procuretype']))
$procuretype=$_GET['procuretype'];
if(isset($_GET['unitname']))
$unitname=$_GET['unitname'];
if(isset($_GET['budgetyear']))
$budgetyear=$_GET['budgetyear'];
$showunitname="หน่วยงาน : ".$unitname;
if(empty($unitname))
	$showunitname="รวม";
//return;
$header=$showunitname.' วิธีการ : '.$procuretype;
if(empty($procuretype))
$header=$unitname.' วิธีการ : '.'จัดซื้อ/จัดจ้าง';
if(empty($procuretype) && empty($unitname))
$header="รายการจัดซื้อ/จ้างที่รายงาน รมว.กห.";

$itemqty=$_GET['itemqty'];
?>
<h3 class="alert alert-success"><?php echo $header; ?>  จำนวน :<?php echo $itemqty; ?> รายการ วงเงินรวม :<?php echo number_format($totalbudget,2); ?> บาท</h3>

<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/procure/report" class="btn btn-info">กลับหน้าสรุป</a>
<?php //echo CHtml::link('ค้นหา','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchshow',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'procure-grid',
	'dataProvider'=>$model->searchprocuretype($budgetyear,$procuretype,$unitname),
	//'summaryText'=>"กำลังแสดง {start}-{end} จากทั้งหมด {count} รายการ",
	'summaryText'=>'',
	//'filter'=>$model,
	'htmlOptions' => array('class'=>'table table-striped table-bordered table-hover'),
	'rowCssClassExpression'=>'  ( $row%2 ? \'warning\' : \'info\' ) ',
	//'type'=>'striped bordered condensed',

			
	'columns'=>array(
		//'idprocure',
		'unitname',
		
		/*array('name'=>	'unitname',
			'type'=>'raw',
			'value'=>'$data->unitname',
			'headerHtmlOptions'=>array('class'=>'info'),
			//'filter'=>'';
			),
		*/
		'description',
		'budgetyear',
		'method',
		//'budget',
		/*
		array('name'=>'budget',
			'type'=>'raw',
			'value'=>'Yii::app()->format->formatNumber($data->budget)',
			),
		*/
		array('name'=>'approve_budget',
			'type'=>'raw',
			'value'=>'Yii::app()->format->formatNumber($data->approve_budget)',
			),		
		'procure_status',
		'approvedate',		
		/*'saler',
		'product',
		'country',
		
		'period',
		'editor',
		'remark',
		'file',
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
		*/
			array(
			//'class'=>'CButtonColumn',
				'header'=>'ข้อมูล',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}',
			
			'buttons'=>array
    		(
	        'view' => array
	        (
	            'label'=>'Send an e-mail to this user',
	            'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
	            'url'=>'Yii::app()->createUrl("procure/viewshow", array("id"=>$data->idprocure))',
	        ),
	        ),
        
            ),
	),
)); ?>
