<?php
/* @var $this RegisterOwnerController */
/* @var $model RegisterOwner */

/*
 $this->breadcrumbs=array(
	'Register Owners'=>array('index'),
	$model->owner_id=>array('view','id'=>$model->owner_id),
	'Update',
);
*/
/*
 $this->menu=array(
	array('label'=>'List RegisterOwner', 'url'=>array('index')),
	array('label'=>'Create RegisterOwner', 'url'=>array('create')),
	array('label'=>'View RegisterOwner', 'url'=>array('view', 'id'=>$model->owner_id)),
	array('label'=>'Manage RegisterOwner', 'url'=>array('admin')),
);

 */
?>

<h1>แก้ไขหน่วยงาน # <?php echo $model->owner_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>