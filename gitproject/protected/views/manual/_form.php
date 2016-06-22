<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'manual-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->fileFieldRow($model,'file',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->hiddenField($model,'createdate',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($model,'createby',array('class'=>'span5','maxlength'=>20, 'value'=>Yii::app()->user->name)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'เพิ่ม' : 'บันทึก',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
