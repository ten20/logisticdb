<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'log-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textAreaRow($model,'url_address',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'ip_address',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'log_type',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'log_date',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'log_fulltext',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
