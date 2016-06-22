<?php
/*
$this->breadcrumbs=array(
	'Cotypes',
);

$this->menu=array(
	array('label'=>'Create Cotype','url'=>array('create')),
	array('label'=>'Manage Cotype','url'=>array('admin')),
);
*/
?>


<?php 
/*$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
*/ ?>
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
$title=$_GET['title'];
?>
 <div class="container">
 
<h2 class="alert alert-info" align="center"><i class="fa fa-users" aria-hidden="true"></i>
<?php echo $title; ?></h2>
<div class="row well">
 
	<?php 
//$dataProvider = new CActiveDataProvider('Cotype');
$iterator = new CDataProviderIterator($dataProvider);
foreach($iterator as $category) {
	$cotypeid= ($category->idcotype	);
   $cotypename = ($category->cotypename);
   ?>
   	<div class="alert alert-success">
		<h4><i class="fa fa-play-circle"></i> <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/file/cotype/<?php echo $cotypeid; ?>"><?php echo $cotypename; ?></a></h4>	
   </div>
<?php } ?>
</div>

<hr/><p align="right"><button onclick="window.history.back();" class="btn btn-primary">Back</button></p>

