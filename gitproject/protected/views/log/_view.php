<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->log_id),array('view','id'=>$data->log_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_address')); ?>:</b>
	<?php echo CHtml::encode($data->url_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_address')); ?>:</b>
	<?php echo CHtml::encode($data->ip_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_type')); ?>:</b>
	<?php echo CHtml::encode($data->log_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_date')); ?>:</b>
	<?php echo CHtml::encode($data->log_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_fulltext')); ?>:</b>
	<?php echo CHtml::encode($data->log_fulltext); ?>
	<br />


</div>