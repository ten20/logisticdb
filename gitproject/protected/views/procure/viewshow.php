<?php
/*
$this->breadcrumbs=array(
	'Procures'=>array('index'),
	$model->idprocure,
);
*/
/*
$this->menu=array(
	//array('label'=>'List Procure','url'=>array('index')),
	array('label'=>'เพิ่มข้อมูล','url'=>array('create')),
	array('label'=>'แก้ไขข้อมูล','url'=>array('update','id'=>$model->idprocure)),
	array('label'=>'ลบข้อมูล','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idprocure),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'สรุปรายการจัดซื้อ','url'=>array('admin')),
);
*/
?>

<h3 class="alert alert-success">รายละเอียดการจัดซื้อ/จัดจ้าง</h3>
<button onclick=" window.history.back();" class="btn btn-info"> กลับ </button>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	//'type' => 'striped bordered condensed',
	'htmlOptions' => array('class'=>'alert alert-info table table-striped table-bordered table-hover ','style'=>'font-size:18px;'),
	'attributes'=>array(
		//'idprocure',
		'unitname',
		'procure_type',
		'description',
		'budgetyear',
		'method',
		//'budget',
		array('name'=>'budget',
		'type'=>'raw',
		'value'=>Yii::app()->format->formatNumber($model->budget),
		),	

		'approve_type',
		'approvedate',
		'procure_status',
		'saler',
		'product',
		array('name'=>'approve_budget',
		'type'=>'raw',
		'value'=>Yii::app()->format->formatNumber($model->approve_budget),
		),	
		'country',
		'period',
		'editor',
		'remark',
		//'file',
	),
)); ?>
