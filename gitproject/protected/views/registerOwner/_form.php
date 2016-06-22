<?php
/* @var $this RegisterOwnerController */
/* @var $model RegisterOwner */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-owner-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'owner_fullname'); ?>
		<?php echo $form->textField($model,'owner_fullname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'owner_fullname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'owner_shortname'); ?>
		<?php echo $form->textField($model,'owner_shortname',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'owner_shortname'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->