<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrank')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idrank),array('view','id'=>$data->idrank)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rank_fullname')); ?>:</b>
	<?php echo CHtml::encode($data->rank_fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rank_shortname')); ?>:</b>
	<?php echo CHtml::encode($data->rank_shortname); ?>
	<br />


</div>