<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idoperation')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idoperation),array('view','id'=>$data->idoperation)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oyear')); ?>:</b>
	<?php echo CHtml::encode($data->oyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('odate')); ?>:</b>
	<?php echo CHtml::encode($data->odate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file')); ?>:</b>
	<?php echo CHtml::encode($data->file); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdate')); ?>:</b>
	<?php echo CHtml::encode($data->createdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createby')); ?>:</b>
	<?php echo CHtml::encode($data->createby); ?>
	<br />


</div>