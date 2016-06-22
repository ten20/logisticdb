<?php
/*
$this->breadcrumbs=array(
	'Countries'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	//array('label'=>'List Country','url'=>array('index')),
	array('label'=>'เพิ่ม','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('country-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>รายชื่อประเทศ</h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'country-grid',
	'dataProvider'=>$model->search(),
	'summaryText'=>"กำลังแสดง {start}-{end} จากทั้งหมด {count} รายการ",
	'filter'=>$model,
	'columns'=>array(
		'idcountry',
		'countryname_th',
		'countryname_en',
		//'picture',
		  array(
            'name'=>'picture',
            'type'=>'html',
            //'value'=>'(!empty($data->picture))?CHtml::image(Yii::app()->request->baseUrl."/pictures/".$data->picture),"",array("style"=>"width:25px;height:25px;")):"no image"',
            'value'=>'(!empty($data->picture)?CHtml::image(Yii::app()->request->baseUrl."/images/flags-mini/".$data->picture,$data->picture,array("class"=>"img-thumnail","width"=>"40px")):CHtml::image(Yii::app()->request->baseUrl."/pictures/nophoto.png",$data->picture,array("class"=>"img-thumnail","width"=>"40px")))',
            //'value'=>'CHtml::image(Yii::app()->request->baseUrl."/pictures/".$data->picture,$data->picture,array("class" => "img-rounded","width"=>"100px"))',
        ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
