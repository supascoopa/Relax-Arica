<div class="view">

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idUsuario),array('view','id'=>$data->idUsuario)); ?>
	<br /> -->

	<!-- <b><?php /*echo CHtml::encode($data->getAttributeLabel('nombre')); */?>:</b> -->
	<b style="font-size: 18px"><?php echo CHtml::link(CHtml::encode($data->nombre),array('view','id'=>$data->idUsuario)); ?></b>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login')); ?>:</b>
	<?php echo CHtml::encode($data->login); ?>
	<br />
<!-- 
	<b><?php /*echo CHtml::encode($data->getAttributeLabel('pass'));*/ ?>:</b>
	<?php /*echo CHtml::encode($data->pass);*/ ?>
	<br /> -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php 
		$tipoStr = "";
		if($data->tipo==0) $tipoStr = "Administrador";
		else if($data->tipo==1) $tipoStr = "Cliente";
		else if($data->tipo==2) $tipoStr = "Escort";
		else $tipoStr = "Desconocido";	
	
	echo CHtml::encode($tipoStr); ?>
	<br />
	<br />

</div>