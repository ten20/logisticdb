<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'plan-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'), // จุดสำคัญ ห้ามลืมใส่ กรณี "อัพโหลดไฟล์ทุกชนิด"

)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'coid',array('class'=>'span5')); ?>

	<?php if(isset($model->id)){
			//$model->cologisticname=$model->cologistich->title;
			$id=$model->coid;
		}else{
			 $model->coid=$id; //create
		}
		//echo $id;
		?>
		<?php //echo $form->labelEx($model,'coid'); ?>
		<?php echo $form->hiddenField($model,'coid'); ?>
		<?php //echo $form->error($model,'coid'); ?>		
	<?php //echo $form->textFieldRow($model,'planyear',array('class'=>'span5','maxlength'=>4)); ?>
	<?php echo $form->labelEx($model,'planyear'); ?>
	<?php
	/*
	$criteria=new CDbCriteria();
	$criteria->condition="id=$id";
	$records = CologisticH::model()->findAll($criteria);
	$list = CHtml::listData($records, 'id', 'title');
	*/
     $yearstart=date('Y')+542;
     $yearend=date('Y')+544;
     $list=array();
     for($year=$yearstart;$year<=$yearend;$year++){
     	//echo $year;
     	$list[$year]=$year;
     }
	echo $form->dropDownList($model,'planyear' , 
	      $list
	      ,array('class' => 'span1')
	      ,array('options' => array($id=>array('selected'=>true)))
	      );
	 ?>	
	<?php // echo $form->textFieldRow($model,'plandate',array('class'=>'span5')); ?>
	<?php /*
	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $model,
    'attribute' => 'plandate',
    'options' => array(
        'showAnim' => 'fold',
        'dateFormat' => 'dd-mm-yy',
        'ttonImageOnly' => false,
        'dayNamesMin' => array('อา','จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'),
        'monthNamesShort' => array('มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม',
            'มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'),
        'changeMonth' => true,
        'changeYear' => true,
        'beforeShow' => 'js:function(){  
            if($(this).val() != ""){
                var arrayDate = $(this).val().split("-");     
                arrayDate[2] = parseInt(arrayDate[2]) - 543;
                $(this).val(arrayDate[0] + "-" + arrayDate[1] + "-" + arrayDate[2]);
            }
            setTimeout(function(){
                $.each($(".ui-datepicker-year option"), function(j, k){
                    var textYear = parseInt($(".ui-datepicker-year option").eq(j).val()) + 543;
                    $(".ui-datepicker-year option").eq(j).text(textYear);
                });             
            },50);
        }',
        'onClose' => 'js:function(){
            if($(this).val() != "" && $(this).val() == dateBefore){         
                var arrayDate = dateBefore.split("-");
                arrayDate[2] = parseInt(arrayDate[2]) + 543;
                $(this).val(arrayDate[0] + "-" + arrayDate[1] + "-" + arrayDate[2]);    
            }       
        }',
        'onSelect' => 'js:function(dateText, inst){ 
            dateBefore = $(this).val();
            var arrayDate = dateText.split("-");
            arrayDate[2] = parseInt(arrayDate[2]) + 543;
            $(this).val(arrayDate[0] + "-" + arrayDate[1] + "-" + arrayDate[2]);
        }',   
    ),
    'htmlOptions' => array(
        'style' => 'height:20px;'
    ),
));
*/
?>
<?php   echo $form->labelEx($model,'plandate');  //ใส่ label ของ form
            //echo '<div class="input-prepend"><span class="add-on"><i class="icon-calendar"></i></span>'; //ใส่ icon ลงไป
            $form->widget('zii.widgets.jui.CJuiDatePicker',
            array(
                'attribute'=>'plandate', //อย่าลืมใส่ attribute ด้วยทุกครั้งนะ ! อ้างอิงจาก Model
                'model'=>$model,
                'language'=>'th',
                'options' => array(
                                  'mode'=>'focus',
                                  'dateFormat'=>'yy-mm-dd', //กำหนด date Format
                                  'showAnim' => 'fold',
                                  'showButtonPanel' => 'true'
                                  ),
                'htmlOptions'=>array('class'=>'span2', 'value'=>$model->plandate),  // ใส่ค่าเดิม ในเหตุการ Update 
             )
        );
         ?>
	<?php echo $form->textAreaRow($model,'plandetail',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textFieldRow($model,'planfile',array('class'=>'span5','maxlength'=>200)); ?>
	<?php echo $form->labelEx($model,'planfile'); ?>
	<?php $this->widget('CMultiFileUpload', array(
            'model' => $model,
            'attribute' => 'planfile', // ชื่อ Field ที่ต้องการเก็บไฟล์
            'max' => 1, // จำนวนสูงสุดที่สามารถอัพโหลดเข้าไปได้
            'accept' => 'png|doc|docx|ppt|pttx|xls|xlsx|pdf', // นามสกุลไฟล์
            'remove' => '[ลบไฟล์]', // ข้อความแสดง เมื่อต้องการลบไฟล์
            'duplicate' => 'พบไฟล์ซ้ำ!', // ข้อความแจ้งเตือน กรณีอัพโหลดไฟล์ซ้ำ
            // ข้อความแจ้งเตือน กรณีอัพโหลดไฟล์ไม่ถูกต้อง
            'denied' => 'นามสกุลไฟล์ไม่ถูกต้อง (png|doc|docx|ppt|pttx|xls|xlsx|pdf)',
       
        ));
         ?>
        <?php echo $form->error($model,'planfile'); ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
