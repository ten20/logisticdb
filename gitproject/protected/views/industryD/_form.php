<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'industry-d-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'industryhid',array('class'=>'span5')); ?>

	<?php echo $form->labelEx($model,'industryhid'); ?>
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
		<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/industryplan/create/<?php echo $model->id;?>">เพิ่มสาระสำคัญ</a>
	</div>
	<?php }else{
		//$id=$records[0]->id;
		?>
	<div>
		<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/industryplan/create/<?php echo $model->id;?>">สรุปสาระสำคัญ</a>
	</div>

	<table class="table table-striped table-bordered">
		<tr class="info">
			<td class='span1'>ปี</td>
			<td class='span1'>ว.ด.ป.</td>
			<td class='span8'>สรุปสารสำคัญ</td>
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
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'เพิ่ม' : 'บันทึก',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
