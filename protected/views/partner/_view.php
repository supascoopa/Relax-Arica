<div class="view">
		<!-- <b><?php /*echo CHtml::encode($data->getAttributeLabel('idPartners'));*/ ?>:</b>
		<?php echo CHtml::link(CHtml::encode($data->idPartners),array('view','id'=>$data->idPartners)); ?>
		<br /> -->
		
		<!--<?php /*echo CHtml::encode($data->getAttributeLabel('nombre'));*/ ?>:-->
		<h4><?php echo CHtml::link(CHtml::encode($data->nombre),array('view','id'=>$data->idPartners)); ?></h4>
		
		<b><?php echo CHtml::encode($data->getAttributeLabel('URL')); ?>:</b>
		<?php echo CHtml::encode($data->URL); ?>
		<br />
		
		<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
		<?php /*echo CHtml::encode($data->tipo);*/
			echo RelaxArica::TipoPartner($data->tipo);		
		?>
		<br />
	
		<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inscrip')); ?>:</b>
		<?php echo CHtml::encode($data->fecha_inscrip); ?>
		<br />

</div>