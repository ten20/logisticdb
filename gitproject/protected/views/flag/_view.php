<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idflag')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idflag),array('view','id'=>$data->idflag)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countryname_th')); ?>:</b>
	<?php echo CHtml::encode($data->countryname_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countryname_en')); ?>:</b>
	<?php echo CHtml::encode($data->countryname_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('picture')); ?>:</b>
	<?php echo CHtml::encode($data->picture); ?>
	<br />


</div>