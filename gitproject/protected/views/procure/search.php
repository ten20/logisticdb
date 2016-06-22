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

<h3>รายการจัดซื้อ/จัดจ้าง</h3>

<?php echo CHtml::link('ค้นหา','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:block">
<?php $this->renderPartial('_searchshow',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'procure-grid',
	'dataProvider'=>$model->search(),
	'summaryText'=>"กำลังแสดง {start}-{end} จากทั้งหมด {count} รายการ",
	'htmlOptions' => array('class'=>'table table-striped table-bordered table-hover alert alert-success'),
	'rowCssClassExpression'=>'  ( $row%2 ? \'warning\' : \'info\' ) ',
	//'filter'=>$model,
	'columns'=>array(
		//'idprocure',
		'unitname',
		'description',
		'budgetyear',
		'method',
		//'budget',
		/*
		array(
        'name'=>'รวมเงินแผน',
        'footer'=>"Total: ".$model->approve_budget,
                ),*/


		array('name'=>'budget',
			'type'=>'raw',
			'value'=>'Yii::app()->format->formatNumber($data->budget)',
			),
		array('name'=>'approve_budget',
			'type'=>'raw',
			'value'=>'Yii::app()->format->formatNumber($data->approve_budget)',
			),
       array(
                'name'=>'รวมเงินอนุมัติ',
                'footer'=>'รวม: ' . $model->getTotal($model->search()->getData(), 'approve_budget'),
        ),
		/*
		'procure_status',
		'approvedate',
		
		'saler',
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
<hr/><p align="right">
<!--<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/menu/menu01" class="btn btn-primary">Back</a>-->
<button class="btn btn-primary" onclick="window.history.back();">Back</button>
</p>