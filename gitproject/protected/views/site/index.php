<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
//print_r($models);
?>
 <h3>ยินดีต้อนรับ <?php echo Yii::app()->user->name;?> เข้าสู่ระบบ <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h3>
 
 <?php 
echo CHtml::label('* ผู้ดูแลระบบเท่านั้นสามารถเข้าระบบโดยใช้ Username และ Password ของ อีเมล์ ทร.','checkbox-id',array('class'=>'red','hidden'=>Yii::app()->user->id));         
?>
<style>
.red{
     color: red;
}
</style>

 <div align="left">
     <h3><b>ความสามารถของระบบ</b></h3>
     <ul>
      <li>
        บันทึกข้อมูลการจับกุม
      </li>
      <li>
        รายงานข้อมูลการจับกุม
      </li>
   </ul>
 </div>
 <?php
//echo  CHtml::link('<img src="'.Yii::app()->request->baseUrl.'/images/sarabun1.png" /> ลงทะเบียนรับ', array("registerReceive/Create"));
?>
<?php
/*
echo CHtml::image(Yii::app()->request->baseUrl.'/images/sarabun0.png', 'ส่วนที่ 1');echo CHtml::image(Yii::app()->request->baseUrl.'/images/sarabun1.png', 'ส่วนที่ 1');
echo CHtml::image(Yii::app()->request->baseUrl.'/images/sarabun2.png', 'ส่วนที่ 1');
echo CHtml::image(Yii::app()->request->baseUrl.'/images/sarabun3.png', 'ส่วนที่ 1');
echo CHtml::image(Yii::app()->request->baseUrl.'/images/sarabun4.png', 'ส่วนที่ 1');
echo CHtml::image(Yii::app()->request->baseUrl.'/images/sarabun5.png', 'ส่วนที่ 1');
echo CHtml::image(Yii::app()->request->baseUrl.'/images/sarabun6.png', 'ส่วนที่ 1');
 */
 ?>

