<?php
$this->pageTitle=Yii::app()->name;
//print_r($models);
?>
<?php
/* @var $this MobilizationController */
/*
$this->breadcrumbs=array(
	'Mobilization',
);
*/
//var_dump($menu[0]->title);
?>
 <div class="container">
 
<h2 class="alert alert-info" align="center"><i class="fa fa-users" aria-hidden="true"></i><?php echo $_GET['title']; ?></h2>
<div class="row well">
 
<div class="alert alert-success">
	<h4><i class="fa fa-check-circle"></i> <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/industryD/updateshow/1"><?php echo $menu[0]->title; ?></a></h4>
	</div>
	<?php 
  	$level= Yii::app()->user->getState('users')->user_level;
	if($level=='1'){ ?>
	<div class="alert alert-success">
	<h4><i class="fa fa-check-circle"></i> <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/procure/report">สรุปสถานภาพการจัดซื้อ/จ้าง ที่อยู่ในอำนาจของ รมว.กห./ปล.กห.</a></h4>	
	</div>
	<?php } ?>
	<div class="alert alert-success">
		<!--<h4><i class="fa fa-check-circle"></i> <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/procure/adminshow">กฏ ระเบียบ คำสั่ง ที่เกี่ยวข้อง</a></h4>-->
		<h4><i class="fa fa-check-circle"></i> <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/manual/adminshow">กฏ ระเบียบ คำสั่ง ที่เกี่ยวข้อง</a></h4>

	</div>
	<div class="alert alert-success">
		<!--<h4><i class="fa fa-check-circle"></i> <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/menu/menu0104/?title=ขั้นตอนการจัดซื้อ/จ้าง และเอกสารประกอบ">ขั้นตอนการจัดซื้อ/จ้าง และเอกสารประกอบ </a></h4>
		<h4><i class="fa fa-circle-o"></i> ขั้นตอนการจัดซื้อ/จ้าง และเอกสารประกอบ </h4>-->
		<h4><i class="fa fa-check-circle"></i> <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/cotype/menu/?title=ขั้นตอนการจัดซื้อ/จ้าง และเอกสารประกอบ">ขั้นตอนการจัดซื้อ/จ้าง และเอกสารประกอบ </a></h4>
		</div>
	
</div>
  </div>
</div>
<hr/><p align="right"><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/menu" class="btn btn-primary">Back</a></p>