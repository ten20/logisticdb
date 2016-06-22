<div class="form">

<?php
/*
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    'id'=>'service-form',
    'enableAjaxValidation'=>false,
    'method'=>'post',
    'type'=>'horizontal',
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data'
    )
)); 
*/?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'service-form',
	'enableAjaxValidation'=>false,
	'method'=>'post',
    'type'=>'horizontal',
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data',
        'class'=>'alert alert-info',
    )
)); ?>
    <fieldset>
            <h1>Import CSV</h1>

        <?php echo $form->errorSummary($model, 'Opps!!!', null, array('class'=>'alert alert-error span12')); ?>

        <div class="control-group">     
            <div class="span4">
        <div class="control-group <?php if ($model->hasErrors('postcode')) echo "error"; ?>">
        <?php echo $form->labelEx($model,'file'); ?>
        <?php echo $form->fileField($model,'file'); ?>
        <?php echo $form->error($model,'file'); ?>
                            </div>


            </div>
        </div>

        <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'icon'=>'ok white', 'label'=>'IMPORT')); ?>
            <?php //$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'icon'=>'remove', 'label'=>'Reset')); ?>
        </div>

        <?php 
        if(isset($importqty)){
            echo '<div class="form-actions alert alert-success">';
            echo "นำเข้า ".$importqty. " รายการ เรียบร้อย...";
            echo '</div>';
        }
        ?>
		<?php /*$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Save',
		)); */?>
	
    </fieldset>

<?php $this->endWidget(); ?>
<p class="alert alert-danger"><b>*หมายเหตุ</b> ไฟล์ csv ต้องมีรูปแบบรายการที่ 1  ตามตัวอย่างด้านล่าง ต่อจากนั้นเป็นรายการของข้อมูล</p>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/import_csv.jpg">

</div><!-- form -->
