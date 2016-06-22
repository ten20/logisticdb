<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcotype')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcotype),array('view','id'=>$data->idcotype)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cotypename')); ?>:</b>
	<?php echo CHtml::encode($data->cotypename); ?>
	<br />


</div>