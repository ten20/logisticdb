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
 
<h2 class="alert alert-info" align="center"><i class="fa fa-users" aria-hidden="true"></i>
<?php echo $_GET['title']; ?></h2>
<div class="row well alert-info" style="border:red solid;">
 
<div class="alert alert-success">
	<h4><i class="fa fa-play-circle"></i> <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/industryD/updateshow/4"><?php echo $menu[0]->title; ?></a></h4>
	</div>
	
</div>
  </div>
</div>
<hr/><p align="right"><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/menu" class="btn btn-primary">Back</a></p>