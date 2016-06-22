<?php
/* @var $this TbluserController */
/* @var $model Tbluser */
/*
$this->breadcrumbs=array(
	'Tblusers'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	//array('label'=>'List Tbluser', 'url'=>array('index')),
	array('label'=>'เพิ่มผู้ใช้งาน', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbluser-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>ข้อมูลผู้ใช้งาน</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbluser-grid',
	'dataProvider'=>$model->search(),
	'summaryText'=>"กำลังแสดง {start}-{end} จากทั้งหมด {count} รายการ",
	'filter'=>$model,
	'columns'=>array(
		'user_id',
		'user_name',
		//'user_pwd',
		'pre_name',
		'first_name',
		'last_name',
		'email',
		'tel',
		/*
		'department',
		'position',
		'created',
		'modified',
		'user_level',
		'last_login',
		'count_visit',
		*/
		array(
			'class'=>'CButtonColumn',
			//    'template'=>'{view}{update}{delete}',
			'visible'=>"Yii::app()->user->name=='admin'",
			'buttons'  => array(
			'delete' => array(
				'visible' => '$data->user_name!=\'admin\' ', // assumes model has canDelete attribute
            )
            ),
		),
	),
)); ?>
