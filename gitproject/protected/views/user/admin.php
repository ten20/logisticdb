<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User','url'=>array('index')),
	array('label'=>'Create User','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>ข้อมูลผู้ใช้งาน</h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'user_id',
		'user_name',
		//'user_pwd',
		'pre_name',
		'first_name',
		'last_name',		
		'department',
		//'email',
		'tel',
		/*'position',
		'created',
		'modified',
		'user_level',
		'last_login',
		'count_visit',
		*/
		/*
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
			*/	array(
			//'class'=>'CButtonColumn',
			'class'=>'bootstrap.widgets.TbButtonColumn',
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
