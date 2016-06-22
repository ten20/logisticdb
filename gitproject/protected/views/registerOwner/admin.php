<?php
/* @var $this RegisterOwnerController */
/* @var $model RegisterOwner */
/*
$this->breadcrumbs=array(
	'Register Owners'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	//array('label'=>'List RegisterOwner', 'url'=>array('index')),
	//array('label'=>'Create RegisterOwner', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#register-owner-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>ตั้งค่าหน่วยผู้ใช้ระบบ</h1>

<?php
//echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'register-owner-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	//	'owner_id',
		'owner_fullname',
		'owner_shortname',
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update}',
		),
	),
)); ?>
