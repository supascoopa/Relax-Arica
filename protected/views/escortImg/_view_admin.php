<?php 
	$home = Yii::app()->baseUrl;
	Yii::app()->clientScript->registerScript('_view_admin', "
	$('button').click(function(){
		var idDiv = $(this).val(); 
		var accion = $(this).attr('acc');
		
		var datos = [idDiv, accion];
		var json = JSON.stringify(datos);
		
		$.ajax({
		  url: '".$home."/index.php/escortImg/AdminSolic',
		  context: document.body,
		  data: {'json': json},
		  type: 'POST',
		}).done(function() {
		  $('#'+idDiv).fadeOut('slow');
		});				
		return false;	
	});
	");
?>
<div id="<?php echo $data->idEscort_IMG;?>" class="view glow" style="padding-bottom:10px;">
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
			
			<div class="span4" style="margin-top:10px;">		
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
			<div class="span2" style="margin-top:10px; margin-right: 20px;">
			<form class="form-vertical" onsubmit="return false" style="margin: 0 0 5px;" id="escort-img-form" action="/RelaxArica/index.php/escortImg/AdminSolic/" method="post">	
				<button value="<?php echo $data->idEscort_IMG;?>" acc=1 class="btn btn-large btn-block btn-success" type="submit">Aceptar</button>
			</form>
			<form class="form-vertical" style="margin: 0 0 5px;" id="escort-img-form" action="/RelaxArica/index.php/escortImg/AdminSolic/" method="post">	
				<button value="<?php echo $data->idEscort_IMG;?>" acc=0 class="btn btn-large btn-block btn-danger" type="submit">Rechazar</button>
			</form>			
			</div>
		
		<br />
	</div>
</div><br />