<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'import-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=> array('enctype'=>'multipart/form-data'),
)); ?>

	<div class="row">
        <?php echo $form->labelEx($model,'file_excel'); ?>
        <?php echo $form->Filefield($model,'file_excel'); ?>
        <?php echo $form->error($model,'file_excel'); ?>
	</div>
     <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'icon'=>'ok white', 'label'=>'IMPORT')); ?>
            <?php //$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'icon'=>'remove', 'label'=>'Reset')); ?>
        </div>

<?php $this->endWidget(); ?>
</div>    