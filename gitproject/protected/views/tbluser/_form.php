<?php
/* @var $this TbluserController */
/* @var $model Tbluser */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbluser-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_name'); ?>
		<?php 
            if( $model->user_name=='admin')
                echo $form->textField($model,'user_name',array('disabled'=>'true','size'=>25,'maxlength'=>45))."* ห้ามแก้ไข";
            else
                echo $form->textField($model,'user_name',array('size'=>25,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'user_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_pwd'); ?>
		<?php echo $form->textField($model,'user_pwd',array('size'=>45,'maxlength'=>45)); ?>*แก้ไขถ้าต้องการเปลี่ยนรหัสผ่าน
		<?php echo $form->error($model,'user_pwd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pre_name'); ?>
		<?php //echo $form->textField($model,'pre_name',array('size'=>45,'maxlength'=>45)); 
		$ranks=Globals::ranks();
		echo $form->dropDownList($model,'pre_name',$ranks, array('options' => array($model->pre_name=>array('selected'=>true)))); 

		?>
		<?php echo $form->error($model,'pre_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>25,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>25,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department'); ?>
		<?php echo $form->textField($model,'department',array('size'=>25,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'department'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>25,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel'); ?>
		<?php echo $form->textField($model,'tel',array('size'=>25,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>25,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'user_level'); ?>
		<?php //echo $form->textField($model,'user_level',array('size'=>1,'maxlength'=>1)); ?>
		<?php 
		if( $model->user_name!='admin'){
			//$user_levels=array("1"=>"admin","2"=>"user");
			$user_levels=Globals::UserLevel();
			echo $form->dropDownList($model,'user_level',$user_levels, array('options' => array($model->user_level=>array('selected'=>true)))); 
		}else{
			echo Globals::UserLevel($model->user_level); 
		}
		?>
		<?php echo $form->error($model,'user_level'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'last_login'); ?>
		<?php echo $form->textField($model,'last_login'); ?>
		<?php echo $form->error($model,'last_login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_visit'); ?>
		<?php echo $form->textField($model,'count_visit'); ?>
		<?php echo $form->error($model,'count_visit'); ?>
	</div>
-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'เพิ่ม' : 'บันทึก',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
$("#Tbluser_user_name").blur(function(){
	var email = $("#Tbluser_user_name").val()+'@navy.mi.th';
    $("#Tbluser_email").val(email);
});
</script>