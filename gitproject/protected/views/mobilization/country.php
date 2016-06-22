<?php
$this->pageTitle=Yii::app()->name;
//print_r($model->countryname_th);
?>
<?php
/* @var $this MobilizationController */
/*
$this->breadcrumbs=array(
	'Mobilization',
);
*/
$picture=Yii::app()->request->baseUrl."/images/flags-mini/".$model->picture;
  $url=$model->countryname_th;
  ///
  ?>


 <div class="container">
 
	<h2 class="alert alert-info" align="center">ความร่วมมือด้านการส่งส่งกำลังบำรุง</h2>
	<div class="row well">
  
	<div class="alert alert-info">
		<img class="img-thumbnail"  alt="<?php echo $model->picture; ?>" src="<?php echo $picture;?>">
	<?php echo $model->countryname_th;?>
	</div>
	<div class="alert alert-success">
	<h4>MOU</h4>
	</div>
	<div class="alert alert-success">
	<h4>MOA</h4>
	</div>
	<div class="alert alert-success">
	<h4>การเยี่ยมคำนับ/ปรึกษาหารือ</h4>
	</div>
	<div class="alert alert-success">
	<h4>การจัดทำความตกลงว่าด้วยการจัดหา และการบริการต่างฝ่าย ระหว่าง กห.ไทย - <?php echo $model->countryname_th; ?></h4>
	</div>

  </div>
</div>
<hr/><p align="right"><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/mobilization/cologistic" class="btn btn-primary">Back</a></p>