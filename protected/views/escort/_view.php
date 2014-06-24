<div class="view glow">
	<div class="row ">
		<div class="span1 center-block">
		<?php 
			$FotoPerfil = '/RelaxArica/images/perfil.jpg';
			if(isset($data->foto_perfil) && strlen($data->foto_perfil)>3 || $data->foto_perfil !=null ) echo '<img src="'.$data->foto_perfil.'"  style="margin: 15px 0 0 10px;" alt="" class="img-circle">';
			else echo'<img src="'.$FotoPerfil.'" alt="" class="img-thumbnail">';

		?>		
		</div>
		<div class="span6" style="margin-top:10px;">
			<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('idEscort')); ?>:</b> 
			<?php /*echo CHtml::link(CHtml::encode($data->idEscort),array('view','id'=>$data->idEscort));*/ ?>
			<br />-->
			
			<!-- <b><?php /*echo CHtml::encode($data->getAttributeLabel('nombre_artistico')); */?></b> -->
			<h4><?php echo CHtml::link(CHtml::encode($data->nombre_artistico),array('view','id'=>$data->idEscort)); ?></h4>
		
			<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
			<?php echo CHtml::encode($data->email); ?>
			<br />
		<!-- 
			<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inscrip')); ?>:</b>
			<?php echo CHtml::encode($data->fecha_inscrip); ?>
			<br />
		 -->
			<b><?php echo CHtml::encode($data->getAttributeLabel('idPromo')); ?>:</b>
			<?php /* echo CHtml::encode($data->idPromo);*/
				if(isset($data->idPromo)) echo CHtml::encode('Si');
				else echo CHtml::encode('No');
			?>
			<br />
		<!-- 
			<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_caduc')); ?>:</b>
			<?php echo CHtml::encode($data->fecha_caduc); ?>
			<br />
		
			<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nac')); ?>:</b>
			<?php echo CHtml::encode($data->fecha_nac); ?>
			<br />
		 -->
			<?php /*
			<b><?php echo CHtml::encode($data->getAttributeLabel('peso')); ?>:</b>
			<?php echo CHtml::encode($data->peso); ?>
			<br />
		
			<b><?php echo CHtml::encode($data->getAttributeLabel('altura')); ?>:</b>
			<?php echo CHtml::encode($data->altura); ?>
			<br />
		
			<b><?php echo CHtml::encode($data->getAttributeLabel('medidas')); ?>:</b>
			<?php echo CHtml::encode($data->medidas); ?>
			<br />
		
			<b><?php echo CHtml::encode($data->getAttributeLabel('detalle_servicios')); ?>:</b>
			<?php echo CHtml::encode($data->detalle_servicios); ?>
			<br />
		
			<b><?php echo CHtml::encode($data->getAttributeLabel('horario')); ?>:</b>
			<?php echo CHtml::encode($data->horario); ?>
			<br />
		
			<b><?php echo CHtml::encode($data->getAttributeLabel('tel_1')); ?>:</b>
			<?php echo CHtml::encode($data->tel_1); ?>
			<br />
		
			<b><?php echo CHtml::encode($data->getAttributeLabel('tel_2')); ?>:</b>
			<?php echo CHtml::encode($data->tel_2); ?>
			<br />
		
			<b><?php echo CHtml::encode($data->getAttributeLabel('valor_normal')); ?>:</b>
			<?php echo CHtml::encode($data->valor_normal); ?>
			<br />
		
			<b><?php echo CHtml::encode($data->getAttributeLabel('escort_eval_id')); ?>:</b>
			<?php echo CHtml::encode($data->escort_eval_id); ?>
			<br />
		
			<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
			<?php echo CHtml::encode($data->estado); ?>
			<br />
		
			<b><?php echo CHtml::encode($data->getAttributeLabel('descripc')); ?>:</b>
			<?php echo CHtml::encode($data->descripc); ?>
			<br />
		
			<b><?php echo CHtml::encode($data->getAttributeLabel('foto_perfil')); ?>:</b>
			<?php echo CHtml::encode($data->foto_perfil); ?>
			<br />
		
			*/ ?>
		<br/>
		</div>
	</div>
</div>