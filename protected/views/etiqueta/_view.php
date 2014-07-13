<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEtiqueta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEtiqueta),array('view','id'=>$data->idEtiqueta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Etiqueta')); ?>:</b>
	<?php echo CHtml::encode($data->Etiqueta); ?>
	<br />


</div>