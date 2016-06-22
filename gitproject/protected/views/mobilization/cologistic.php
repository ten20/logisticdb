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
?>
 <div class="container">

<h2 class="alert alert-info" align="center">ความร่วมมือด้านการส่งกำลังบำรุง</h2>

  <div class="row">


<?php 
//var_dump($model);
$n=0;
foreach ($model as $key => $value) {
	$n++;
  $idcountry=$value['idcountry'];
  $countryname_th=$value['countryname_th'];
  $countryname_en=$value['countryname_en'];
  $picture=Yii::app()->request->baseUrl."/images/flags-mini/".$value['picture'];
  $url=$value['idcountry'];
  ///
  ?>
 <div class="span2 well">
	<div class="alert alert-info">
		<img class="img-thumbnail"  alt="<?php echo $value['picture']; ?>" src="<?php echo $picture;?>">
	<?php echo $countryname_th;?>
	</div>
	<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/mobilization/country/<?php echo $idcountry; ?>">
	<div class="btn btn-info">คลิกรายละเอียด
	</div>
	</a>
	</div>    

 
  <?php
  # code...
}
?>

  </div>
</div>
<hr/><p align="right"><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/mobilization" class="btn btn-primary">Back</a></p>