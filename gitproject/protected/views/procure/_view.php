<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idprocure')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idprocure),array('view','id'=>$data->idprocure)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('budgetyear')); ?>:</b>
	<?php echo CHtml::encode($data->budgetyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('method')); ?>:</b>
	<?php echo CHtml::encode($data->method); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('budget')); ?>:</b>
	<?php echo CHtml::encode($data->budget); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approve_type')); ?>:</b>
	<?php echo CHtml::encode($data->approve_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approvedate')); ?>:</b>
	<?php echo CHtml::encode($data->approvedate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('saler')); ?>:</b>
	<?php echo CHtml::encode($data->saler); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product')); ?>:</b>
	<?php echo CHtml::encode($data->product); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period')); ?>:</b>
	<?php echo CHtml::encode($data->period); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('editor')); ?>:</b>
	<?php echo CHtml::encode($data->editor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remark')); ?>:</b>
	<?php echo CHtml::encode($data->remark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file')); ?>:</b>
	<?php echo CHtml::encode($data->file); ?>
	<br />

	*/ ?>

</div>