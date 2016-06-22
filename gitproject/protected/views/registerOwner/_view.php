<?php
/* @var $this RegisterOwnerController */
/* @var $data RegisterOwner */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->owner_id), array('view', 'id'=>$data->owner_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner_fullname')); ?>:</b>
	<?php echo CHtml::encode($data->owner_fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner_shortname')); ?>:</b>
	<?php echo CHtml::encode($data->owner_shortname); ?>
	<br />


</div>