<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<?php echo $form->labelEx($model,'unitname'); ?>
	<?php 
	//$criteria=new CDbCriteria;
	//$criteria->select='AlId,AlDescr'; 
	$unit=Unit::model()->findAll();
	
	$datas=CHtml::listData($unit,'unitname','unitname');
	$datas['']="";
	ksort($datas);	
	//var_dump($datas);
	echo CHtml::activeDropDownList($model, 'unitname', $datas); 

 	?>

	<?php //echo $form->textFieldRow($model,'unitname',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->labelEx($model,'budgetyear'); ?>
	<?php 
	$criteria=new CDbCriteria;
	$criteria->select='distinct substr(budgetyear,1,2) as budgetyear'; 
	$budgetyear=Procure::model()->findAll($criteria);
	
	$datas=CHtml::listData($budgetyear,'budgetyear','budgetyear');
	
	$datas['']="";
	ksort($datas);
	//var_dump($datas);
	echo CHtml::activeDropDownList($model, 'budgetyear', $datas); 
	?>

	<?php //echo $form->textFieldRow($model,'budgetyear',array('class'=>'span5','maxlength'=>5)); ?>
	
	<?php echo $form->labelEx($model,'method'); ?>
	<?php 
	$criteria=new CDbCriteria;
	$criteria->select='distinct substr(budgetyear,1,2) as budgetyear'; 
	$method=ProcureMethod::model()->findAll();
	
	$datas=CHtml::listData($method,'procuremethodname','procuremethodname');
	
	$datas['']="";
	ksort($datas);
	//var_dump($datas);
	echo CHtml::activeDropDownList($model, 'method', $datas); 
	?>
	<?php //echo $form->textFieldRow($model,'method',array('class'=>'span5','maxlength'=>100)); ?>

	<?php //echo $form->textFieldRow($model,'budget',array('class'=>'span5','maxlength'=>10)); ?>
	<?php echo $form->labelEx($model,'procure_status'); ?>
	<?php 
	$criteria=new CDbCriteria;
	$criteria->select='distinct procure_status'; 
	$method=Procure::model()->findAll($criteria);
	
	$datas=CHtml::listData($method,'procure_status','procure_status');
	
	$datas['']="";
	ksort($datas);
	//var_dump($datas);
	echo CHtml::activeDropDownList($model, 'procure_status', $datas); 
	?>
	<?php //echo $form->textFieldRow($model,'procure_status',array('class'=>'span5','maxlength'=>98)); ?>
	<?php echo $form->labelEx($model,'approvedate'); ?>
	<?php 
	//$criteria=new CDbCriteria;
	//$criteria->select='distinct concat(substr(approvedate,1,4),'-',substr(approvedate,6,2),'-',substr(approvedate,9,2)) as approvedate '; 
	//$status=Procure::model()->findAll($criteria);
	//$datas=CHtml::listData($status,'approvedate','approvedate');
	$sql="select distinct approvedate,concat(substr(approvedate,9,2),'/',substr(approvedate,6,2),'/',substr(approvedate,1,4)) as approvedate1 from procure";
	$balance = Yii::app()->db->createCommand($sql);
	$data = $balance->query();
                foreach ($data as $out) {
                	//echo  implode('<br />', $out);
                	$date=$out['approvedate1'];
                	$approvedate=$out['approvedate'];
                	$datas["$approvedate"]=$date;
                }
    //$datas=CHtml::listData($status,'approvedate','approvedate');

	$datas['']="";
	ksort($datas);
	//var_dump($datas);
	echo CHtml::activeDropDownList($model, 'approvedate', $datas); 
	?>
	<?php //echo $form->textFieldRow($model,'approvedate',array('class'=>'span5')); ?>
	
	<?php echo $form->labelEx($model,'saler'); ?>
	<?php 
	$criteria=new CDbCriteria;
	$criteria->select='distinct saler'; 
	$budgetyear=Procure::model()->findAll($criteria);
	
	$datas=CHtml::listData($budgetyear,'saler','saler');
	$datas['']="";
	ksort($datas);
	//var_dump($datas);
	echo CHtml::activeDropDownList($model, 'saler', $datas); 
	?>
	<?php //echo $form->textFieldRow($model,'saler',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->labelEx($model,'product'); ?>
	<?php 
	$criteria=new CDbCriteria;
	$criteria->select='distinct product'; 
	$budgetyear=Procure::model()->findAll($criteria);
	
	$datas=CHtml::listData($budgetyear,'product','product');
	
	$datas[]="";
	ksort($datas);
	//var_dump($datas);
	echo CHtml::activeDropDownList($model, 'product', $datas); 
	?>
		<?php //echo $form->textFieldRow($model,'product',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->labelEx($model,'country'); ?>
	<?php 
	$criteria=new CDbCriteria;
	$criteria->select='distinct country'; 
	$budgetyear=Procure::model()->findAll($criteria);
	
	$datas=CHtml::listData($budgetyear,'country','country');
	
	$datas['']="";
	ksort($datas);
	//var_dump($datas);
	echo CHtml::activeDropDownList($model, 'country', $datas); 
	?>
	<?php //echo $form->textFieldRow($model,'country',array('class'=>'span5','maxlength'=>100)); ?>

	<?php //echo $form->textFieldRow($model,'period',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'editor',array('class'=>'span5')); ?>

	<?php //echo $form->textAreaRow($model,'remark',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textFieldRow($model,'file',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
