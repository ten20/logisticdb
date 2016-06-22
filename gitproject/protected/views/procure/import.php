<?php
$this->pageTitle=Yii::app()->name;
?>
 <div class="container">
 
<h2 class="alert alert-info" align="center"><i class="fa fa-plus-circle" aria-hidden="true"></i>
นำเข้าข้อมูลจัดซื้อ/จ้าง</h2>
<div class="row well">
 	<div class="alert alert-success">
	<h4><i class="fa fa-file-excel-o" aria-hidden="true"></i>
	<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/procure/importexcel">นำเข้าจากไฟล์ EXCEL</a></h4>	</div>
	<!--<div class="alert alert-info">
	<h4><i class="fa fa-file-excel-o" aria-hidden="true"></i>
	<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/procure/importcsv">นำเข้าจากไฟล์ CSV</a></h4>	</div>-->
	
</div>
</div>
<hr/><p align="right"><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/menu" class="btn btn-primary">Back</a></p>