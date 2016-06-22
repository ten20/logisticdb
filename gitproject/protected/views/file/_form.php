<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'file-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'), // จุดสำคัญ ห้ามลืมใส่ กรณี "อัพโหลดไฟล์ทุกชนิด"
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php //echo $form->textFieldRow($model,'coid',array('class'=>'span5')); ?>
	<div class="row">
		<?php if(isset($model->id)){
			//$model->cologisticname=$model->cologistich->title;
			$id=$model->coid;
		}else{
			 $model->coid=$id; //create
		}
		//echo $id;
		?>
		<?php echo $form->labelEx($model,'coid'); ?>
		<?php //echo $form->textField($model,'coid'); ?>
		<?php
			$records = Cotype::model()->findAll();
			$list = CHtml::listData($records, 'idcotype', 'cotypename');
			echo $form->dropDownList($model,'coid' , 
	      $list
	      //,array('empty' => 'เลือกวิธี')
	      );
	 ?>	
		<?php echo $form->error($model,'coid'); ?>
	
	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>200)); ?>
	<?php //echo $form->textAreaRow($model,'title',array('rows'=>3, 'cols'=>40, 'class'=>'span6'));?>
	<?php //echo $form->textFieldRow($model,'filename',array('class'=>'span5','maxlength'=>200)); ?>
	<?php echo $form->labelEx($model,'filename'); ?>
	<?php //echo $form->fileField($model,'filename'); ?>
	<?php /*
    $this->widget('CMultiFileUpload', array(
        'name' => 'filename',
        'model'=> $model,
        'id'=>'filename',
        'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
        'duplicate' => 'Duplicate file!', // useful, i think
        'denied' => 'Invalid file type', // useful, i think
    ));
    */
?>
 <?php $this->widget('CMultiFileUpload', array(
            'model' => $model,
            'attribute' => 'filename', // ชื่อ Field ที่ต้องการเก็บไฟล์
            'max' => 1, // จำนวนสูงสุดที่สามารถอัพโหลดเข้าไปได้
            'accept' => 'png|doc|docx|ppt|pttx|xls|xlsx|pdf', // นามสกุลไฟล์
            'remove' => '[ลบไฟล์]', // ข้อความแสดง เมื่อต้องการลบไฟล์
            'duplicate' => 'พบไฟล์ซ้ำ!', // ข้อความแจ้งเตือน กรณีอัพโหลดไฟล์ซ้ำ
            // ข้อความแจ้งเตือน กรณีอัพโหลดไฟล์ไม่ถูกต้อง
            'denied' => 'นามสกุลไฟล์ไม่ถูกต้อง (png|doc|docx|ppt|pttx|xls|xlsx|pdf)',
       
        ));
         ?>
        <?php echo $form->error($model,'filename'); ?>
	</div>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'เพิ่ม' : 'บันทึก',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
