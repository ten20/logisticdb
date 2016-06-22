<?php
/* @var $this MenuController */
/*
$this->breadcrumbs=array(
	'Menu',
);
*/
?>
 <div class="container" style="border:green solid;text-align:center;">
<!--<div class="well-flulid span12" style="border:green solid;text-align:center;">-->
	<br/>
	<div style="text-align:center;" >
		<img src="<?php echo Yii::app()->request->baseUrl;?>/images/logo01.jpg" width="450px"  class="img-rounded" style="border:red solid">
	</div><br/>
	<div class="container span12" style="text-align:right;" >
	<div class="alert alert-info span3" style="border:blue solid;text-align:center;">
		<img src="<?php echo Yii::app()->request->baseUrl;?>/images/pic01.jpg">
		<?php $title="คณะกรรมการพัฒนา และปฏิรูประบบงานด้านการส่งกำลังบำรุงของ สป."; ?>
		<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/menu/menu01?title=<?php echo $title; ?>" class="btn btn-primary"><?php echo $title; ?><br/>&nbsp;</a>

	</div>
	<div class="alert alert-danger span3" style="border:orange solid;text-align:center;">
		<img src="<?php echo Yii::app()->request->baseUrl;?>/images/pic01.jpg">
		<?php $title="คณะทำงานแก้ไขปัญหาการบุกรุกที่ดินในความครอบครอง ดูแลใช้ประโยชน์ของหน่วยงานทางทหาร"; ?>
		<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/menu/menu02?title=<?php echo $title; ?>" class="btn btn-primary"><?php echo $title; ?></a>
	</div> 
	<div class="alert alert-warning span3" style="border:black solid;text-align:center;">
		<img src="<?php echo Yii::app()->request->baseUrl;?>/images/pic01.jpg">
		<?php $title="คณะทำงานพัฒนาระบบการส่งกำลังบำรุง และการจัดหาพัสดุ สป.<br/>(ภายใต้การกำกับดูแลของ รอง ปล.กห.)"; ?>
		<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/menu/menu03?title=<?php echo $title; ?>" class="btn btn-primary"><?php echo $title; ?></a>
	</div>
	</div>
	<br/><br/><br/>&nbsp;
</div>