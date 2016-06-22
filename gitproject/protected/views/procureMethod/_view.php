<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idprocuremethod')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idprocuremethod),array('view','id'=>$data->idprocuremethod)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('procuremethodname')); ?>:</b>
	<?php echo CHtml::encode($data->procuremethodname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detail')); ?>:</b>
	<?php echo CHtml::encode($data->detail); ?>
	<br />


</div>