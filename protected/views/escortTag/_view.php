<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEscort_etiquetas')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEscort_etiquetas),array('view','id'=>$data->idEscort_etiquetas)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEtiqueta')); ?>:</b>
	<?php echo CHtml::encode($data->idEtiqueta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEscort')); ?>:</b>
	<?php echo CHtml::encode($data->idEscort); ?>
	<br />


</div>