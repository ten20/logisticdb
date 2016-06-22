<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idunit')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idunit),array('view','id'=>$data->idunit)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unitname')); ?>:</b>
	<?php echo CHtml::encode($data->unitname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detail')); ?>:</b>
	<?php echo CHtml::encode($data->detail); ?>
	<br />


</div>