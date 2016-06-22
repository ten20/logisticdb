<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'idprocure',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'unitname',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'budgetyear',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'method',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'budget',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'procure_status',array('class'=>'span5','maxlength'=>98)); ?>

	<?php echo $form->textFieldRow($model,'approvedate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'saler',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'product',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'country',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'period',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'editor',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'remark',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'file',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
