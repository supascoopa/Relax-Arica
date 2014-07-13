<div class="view glow" style="padding-bottom:10px;">
	<div class="row">
		<div class="span1 center-block">
			<?php 
				$FotoPerfil = '/RelaxArica/images/perfil.jpg';
				
				if(isset($data->URL) && strlen($data->URL)>3 || $data->URL !=null ) $FotoPerfil = '<img src="'.$data->URL.'"  style="margin: 15px 0 0 10px; max-width:70px; max-height:70px; width:auto; height:auto;" alt="" class="img-circle">';
				else $FotoPerfil = '<img src="'.$FotoPerfil.'" style="margin: 15px 0 0 10px; max-width:70px; max-height:70px; width:auto; height:auto;" alt="" class="img-circle">';
						
				echo CHtml::link($FotoPerfil,array('view','id'=>$data->idEscort_IMG));
				
				$data->estado = RelaxArica::EstadoFoto($data->estado);

				$Link = RelaxArica::LinkPerfilEscort($data->idEscort);
			?>		
			</div>
			
			<div class="span6" style="margin-top:10px;">		
			<!-- 	<b><?php echo CHtml::encode($data->getAttributeLabel('idEscort_IMG')); ?>:</b>
				<?php echo CHtml::link(CHtml::encode($data->idEscort_IMG),array('view','id'=>$data->idEscort_IMG)); ?>
				<br />
			
				<b><?php echo CHtml::encode($data->getAttributeLabel('URL')); ?>:</b>
				<?php echo CHtml::encode($data->URL); ?>
				<br />
			 -->
				<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
				<?php echo CHtml::encode($data->titulo); ?>
				<br />
			
				<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_subida')); ?>:</b>
				<?php echo CHtml::encode($data->fecha_subida); ?>
				<br />
			
				<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
				<?php echo CHtml::encode($data->estado); ?>
				<br />
			
				<b><?php /*echo CHtml::encode($data->getAttributeLabel('idEscort'));*/ echo 'Escort'; ?>:</b>
				<?php /*echo CHtml::encode($data->idEscort);*/ echo $Link; ?>
				<br />
			</div>
		
		<br />
	</div>
</div><br />