<?php
/* @var $this AdministrationController */
/*
$this->breadcrumbs=array(
	'Administration',
);
*/
?>
<div class="container">
	<center><img src="<?php echo Yii::app()->request->baseUrl;?>/images/LogoOPPFinal1.jpg" width="200px"  class="img-rounded"></center>
	<h2 class="alert alert-info" align="center">ธุรการ และอื่นๆ</h2>

	<h3 class="alert alert-info span5" align="center">
		<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/manual/admin" class="btn btn-primary">คู่มือการปฏิบัติงาน</a>
	</h3>
	<h3 class="alert alert-info span5" align="center">
		<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/operation/admin" class="btn btn-primary">ตารางการปฏิบัติงานประจำปี</a>
	</h3> 
</div>
<hr/><p align="right"><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/menu" class="btn btn-primary">Back</a></p>