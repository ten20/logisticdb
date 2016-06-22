<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'procure-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php //echo $form->textFieldRow($model,'unitname',array('class'=>'span3','maxlength'=>100)); ?>
	<?php echo $form->labelEx($model,'unitname'); ?>
	<?php
	$records = Unit::model()->findAll();
	$list = CHtml::listData($records, 'unitname', 'unitname');
	echo $form->dropDownList($model,'unitname' , 
	      CHtml::listData($records,
	      'unitname', 'unitname')
	      //,array('empty' => 'เลือกวิธี')
	      );
	 ?>	
	
	<?php //echo $form->textFieldRow($model,'procure_type',array('class'=>'span5','maxlength'=>12)); ?>
	<?php echo $form->Label( $model,'procure_type' ); ?>
	<?php echo ZHtml::enumDropDownList( $model,'procure_type',array('class'=>'span3') ); ?>
	
	<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'budgetyear',array('class'=>'span2','maxlength'=>5)); ?>

	<?php //echo $form->textFieldRow($model,'method',array('class'=>'span5','maxlength'=>100)); ?>
<?php 
//$list = CHtml::listData($model, 'a_id', 'a_name');
//echo $form->dropDownList($model,'method',ProcureMethod::model()->findAll());
?>
<?php echo $form->labelEx($model,'method'); ?>
<?php
$records = ProcureMethod::model()->findAll();
$list = CHtml::listData($records, 'procuremethodname', 'procuremethodname');
echo $form->dropDownList($model,'method' , 
      CHtml::listData($records,
      'procuremethodname', 'procuremethodname')
      //,array('empty' => 'เลือกวิธี')
      );
 ?>

 <?php echo $form->labelEx($model,'budget'); ?>

	<?php echo $form->numberField($model,'budget',array('class'=>'span3','maxlength'=>15)); ?>
	<?php //echo $form->textFieldRow($model,'approve_type',array('class'=>'span5','maxlength'=>16)); ?>
	<?php echo $form->Label( $model,'approve_type' ); ?>
	<?php echo ZHtml::enumDropDownList( $model,'approve_type',array('class'=>'span3') ); ?>
	
	<?php //echo $form->textFieldRow($model,'approvedate',array('class'=>'span5')); ?>
	<?php echo $form->Label( $model,'approvedate' ); ?>
	<?php
	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    //'name'=>'publishDate',
    'model'=>$model,
    'attribute'=>'approvedate',
    'language'=>'th',

    // additional javascript options for the date picker plugin
    'options'=>array(
    	//'dateFormat' => 'yy-mm-dd',
        'showAnim'=>'fold',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
        //'numberOfMonths'=>2,
        //'showButtonPanel'=>true,
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
        //'style'=>'height:20px;background-color:green;color:white;',
    ),
	));
	?>
<?php //echo $form->textFieldRow($model,'procure_status',array('class'=>'span5','maxlength'=>16)); ?>
	<?php echo $form->Label( $model,'procure_status' ); ?>
	<?php echo ZHtml::enumDropDownList( $model,'procure_status',array('class'=>'span5') ); ?>

	<?php echo $form->textFieldRow($model,'saler',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'product',array('class'=>'span5','maxlength'=>255)); ?>
	<?php echo $form->labelEx($model,'approve_budget'); ?>

	<?php echo $form->numberField($model,'approve_budget',array('class'=>'span3','maxlength'=>15)); ?>

	<?php //echo $form->textFieldRow($model,'country',array('class'=>'span5','maxlength'=>100)); ?>
	<?php echo $form->labelEx($model,'country'); ?>
	<?php
	$records = Country::model()->findAll();
	$list = CHtml::listData($records, 'countryname_th', 'countryname_th');
	echo $form->dropDownList($model,'country' , 
	      CHtml::listData($records,
	      'countryname_th', 'countryname_th')
	      ,array('empty' => 'เลือกประเทศ')
	      );
	 ?>

	<?php echo $form->textFieldRow($model,'period',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'editor',array('class'=>'span5')); ?>
	<?php echo $form->Label( $model,'editor' ); ?>
	<?php
	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    //'name'=>'publishDate',
    'model'=>$model,
    'attribute'=>'editor',
    'language'=>'th',
	'value'=>$model->editor, 
    // additional javascript options for the date picker plugin
    'options'=>array(
    	//'dateFormat' => 'yy-mm-dd',
        'showAnim'=>'fold',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
        'autoSize'=>true,
        //'numberOfMonths'=>2,
        //'showButtonPanel'=>true,
   
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
        //'style'=>'height:20px;background-color:green;color:white;',
    ),
	));
	?>

	<?php echo $form->textAreaRow($model,'remark',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'file',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
