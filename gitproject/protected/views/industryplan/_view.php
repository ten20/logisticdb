<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('planyear')); ?>:</b>
	<?php echo CHtml::encode($data->planyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plandate')); ?>:</b>
	<?php echo CHtml::encode($data->plandate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plandetail')); ?>:</b>
	<?php echo CHtml::encode($data->plandetail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('planfile')); ?>:</b>
	<?php echo CHtml::encode($data->planfile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('industrydid')); ?>:</b>
	<?php echo CHtml::encode($data->industrydid); ?>
	<br />


</div>