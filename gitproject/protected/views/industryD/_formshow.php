<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'industry-d-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php $getid=$_GET['id']; 
	if($getid!='3' && $getid!='6'){ 
		?>
	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<?php //echo $form->textFieldRow($model,'industryhid',array('class'=>'span5')); ?>

	<?php echo $form->labelEx($model,'industryhid',array('style'=>'font-size:x-large;')); ?>
	<?php
	
	//echo $form->textFieldRow($model,'industryhid',array('class'=>'span5')); ?>
	<?php 
	$criteria=new CDbCriteria();
	
	if(isset($model->id)){
		$id=$model->industryhid;
		$criteria->condition="id=$id";
	}else{
		 $id=1; //create
	}
	/*
	echo $form->textFieldRow($model,'cologisticname',array('class'=>'span5')); 
	*/?>
	<?php //echo $form->textFieldRow($model,'countryid',array('class'=>'span5')); ?>
	<?php //echo $form->labelEx($model,'industryhid'); ?>
	<?php
	
	$records = IndustryH::model()->findAll($criteria);
	//$list = CHtml::listData($records, 'id', 'title');
	echo $form->dropDownList($model,'industryhid' , 
	      CHtml::listData($records,
	      'id', 'title')
	      ,array('class' => 'span5')
	      ,array('options' => array($id=>array('selected'=>true)))
	      );
	 ?>	

	<?php echo $form->textAreaRow($model,'background',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'objecttive',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'about',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textAreaRow($model,'status',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
	<?php } ?>
<?php 
	$plans=array();
	if(isset($model->id)) {

	$criteria=new CDbCriteria();
	$criteria->condition="industrydid=$model->id";
	$plans = Industryplan::model()->findAll($criteria);
	 }
	 ?>
<?php 
	if(isset($model->id) && count($plans)==0){
	?>
	<div>
		<?php if($getid!='3' && $getid!='6'){ ?> 
		สรุปสาระสำคัญ
		<?php } ?>
	</div>
	<?php }else{
		//$id=$records[0]->id;
		?>
	<div>
		<?php if($getid!='3' && $getid!='6'){ ?> 
		สรุปสาระสำคัญ
		<?php } ?>
	</div>

	<table class="table table-striped table-bordered">
		<tr class="info">
			<td class='span1'>ปี</td>
			<td class='span2'>ว.ด.ป.</td>
			<td class='span11'>สรุปสารสำคัญ</td>
			<td>เอกสาร</td>		
		</tr>
	<?php
	$n=0;
	foreach ($plans as $key => $value) {
		$n++;
		echo"<tr>
			<td class='span1'>$value->planyear</td>
			<td>$value->plandate</td>
			<td>$value->plandetail</td>";
		echo "<td>".CHtml::link($value->planfile,Yii::app()->request->baseUrl."/uploadfiles/".$value->planfile,array('target'=>'_blank'))."</td>		
		</tr>";

	 } 
	 ?>
		</table>
	<?php }
	  ?>	
	<?php if($getid!='3' && $getid!='6'){ ?> 
	<div class="form-actions"><i class="fa fa-print fa-2x"></i>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'button',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'พิมพ์' : 'พิมพ์',
			//'htmlOptions'=>array('class'=>'btn btn-info'),
		)); ?>
	</div>
	<?php } ?>
	  <!--
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>-->

<?php $this->endWidget(); ?>
