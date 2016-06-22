<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'operation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'oyear',array('class'=>'span5','maxlength'=>4)); ?>

	<?php echo $form->textFieldRow($model,'odate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'file',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->hiddenField($model,'createdate',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($model,'createby',array('class'=>'span5','maxlength'=>20, 'value'=>Yii::app()->user->name)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
