<?php
/* @var $this SiteController */
Yii::app()->clientScript->registerScript('index', "
			$(document).ready(function(){
		
	    $(\"[rel='tooltip']\").tooltip();
	    $('#escorts-4col .thumbnail').hover(
	        function(){
	            $(this).find('.caption').slideDown(250); //.fadeIn(250)
	        },
	        function(){
	            $(this).find('.caption').slideUp(250); //.fadeOut(205)
	        }
	    );

		$('.fotos').hover(function(){
			var foto = $(this).attr('src');
			var id = $(this).attr('escort');
			$('#visor-foto-'+id).attr('src', foto);

		});
	});");
$this->pageTitle=Yii::app()->name;
?>
<div class="span12 grid-escorts">
	<h2 class="lusty">Destacadas</h2>
	<ul class="thumbnails" id="escorts-4col">
	<?php 
		$Escorts = EscortPerfil::model()->findAllByAttributes(array('estado'=>1));
		
		if($Escorts!=null) 
			foreach ($Escorts as $Escort) {
				$Telefono1='-'; $Telefono2='-'; $Valor = '-'; $Promo = '-'; $Edad = '-'; $Peso = '-'; $Altura ='-'; $Medidas = '-'; $Nombre = '?'; $Servicios ="-";
				$idModal = 'modal-'.$Escort->idEscort;	
				
				if(strlen($Escort->tel_1)>0) $Telefono1 = $Escort->tel_1;
				if(strlen($Escort->tel_2)>0) $Telefono2 = $Escort->tel_2;
				if(strlen($Escort->valor_normal)>0) $Valor = $Escort->valor_normal;					
				if($Escort->idPromo != null && isset($Escort->idPromo)) $Promo=$Escort->idPromo;
				if($Escort->peso!=null && isset($Escort->peso) && strlen($Escort->peso)>0) $Peso = $Escort->peso.' kg';
				if($Escort->valor_normal!=null && isset($Escort->valor_normal) && strlen($Escort->valor_normal)>0) {
					$Valor = $Escort->valor_normal;					
					$Valor = $Valor/1000;
					$Valor = '$ '.$Valor.'.000';
				}
				if($Escort->altura!=null && isset($Escort->altura)) $Altura = $Escort->altura.' cm';
				if($Escort->medidas!=null && isset($Escort->medidas)) $Medidas = $Escort->medidas;
				if($Escort->nombre_artistico!=null && isset($Escort->nombre_artistico)) $Nombre = $Escort->nombre_artistico;
				if($Escort->fecha_nac!=null && isset($Escort->fecha_nac) && strlen($Escort->fecha_nac)>0){ 
					$Edad = RelaxArica::DiferenciaFechas($Escort->fecha_nac,date("Y-m-d"));
					$Edad = $Edad[0].utf8_encode(' años');
				}
				if($Escort->detalle_servicios!=null && isset($Escort->detalle_servicios)) $Servicios = $Escort->detalle_servicios;
				
				echo '<li class="span2">
						  <div class="thumbnail mini-escort glow2">	        		
						    <div class="caption">
						        <p><b>Tel&eacute;fono:</b> '.$Telefono1.'</p>
								<p><b>Precio:</b> '.$Valor.'</p>
						        <p style="text-align:center;"><a href="#'.$idModal.'" role="button" data-toggle="modal" class="btn btn-inverse" rel="tooltip" title=""><i class="icon-eye-open"></i></a></p>
						    </div>
						    <img src="'.$Escort->foto_perfil.'" alt="">
						    <div class="escort-nombre"><h4 class="lusty" style="margin:0px; text-align:center;">'.$Nombre.'</h4></div>
						  </div>
				</li>';
				//Obtener la primera imagen 
				
				$PrimeraFoto = null;
				
				echo '<div id="'.$idModal.'" class="modal hide fade relax-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-header" style="background-color: #CCCCCC; text-shadow: 1px 1px #292C37;">
						    <button type="button" style="color: #292C37;" class="close" data-dismiss="modal" aria-hidden="true">x</button>
						    <h3 class="lusty" id="myModalLabel">'.$Nombre.'</h3>
						  </div>
						  <div class="modal-body">
						    <div class="span4" style="text-align: center;">
							<div style="width:300px;height:300px; text-align:center;"><img id="visor-foto-'.$Escort->idEscort.'" class="img-rounded visor-foto" src="'.$Escort->foto_perfil.'" alt='.$Nombre.'></div>
						    <div class="row-fluid" style="padding-top: 10px;">';
				echo '<div class="span2"><img escort="'.$Escort->idEscort.'" class="fotos glow2 img-rounded" src="'.$Escort->foto_perfil.'" alt='.$Nombre.'></div>';
				$Fotos = EscortImg::model()->findAllByAttributes(array('idEscort'=>$Escort->idEscort, 'estado'=>'2'));
				if(count($Fotos)>0){
					foreach($Fotos as $Foto) {
						echo '<div class="span2"><img class="fotos glow2 img-rounded" escort="'.$Escort->idEscort.'" src="'.$Foto->URL.'" alt='.$Nombre.'></div>';
					}
				}				
				echo '</div>
							</div>
							<div class="span4">
								<p><b>Descripci&oacute;n: </b>'.$Escort->descripc.'</p>
								<p><b>Promoci&oacute;n: </b>'.$Promo.'</p>
					    		<p><b>Edad: </b>'.$Edad.'</p>
					    		<p><b>Peso: </b>'.$Peso.'</p>
							    <p><b>Altura: </b>'.$Altura.'</p>
							    <p><b>Medidas: </b>'.$Medidas.'</p>
							  	<p><b>Tel&eacute;fono: </b>'.$Telefono1.'</p>
							    <p><b>Tel&eacute;fono: </b>'.$Telefono2.'</p>
							    <p><b>Servicios: </b>'.$Servicios.'</p>
					    	</div>
						  </div>
						</div>';
		}	
	?>
	</ul>
</div>
<div class="span12 grid-escorts">
	<h2 class="lusty">Escorts</h2>
	<ul class="thumbnails" id="escorts-4col">
	<?php 
		$Escorts = EscortPerfil::model()->findAllByAttributes(array('estado'=>1));
		
		if($Escorts!=null) 
			foreach ($Escorts as $Escort) {
				$Telefono1='-'; $Telefono2='-'; $Valor = '-'; $Promo = '-'; $Edad = '-'; $Peso = '-'; $Altura ='-'; $Medidas = '-'; $Nombre = '?'; $Servicios ="-";
				$idModal = 'modal-'.$Escort->idEscort;	
				
				if(strlen($Escort->tel_1)>0) $Telefono1 = $Escort->tel_1;
				if(strlen($Escort->tel_2)>0) $Telefono2 = $Escort->tel_2;
				if(strlen($Escort->valor_normal)>0) $Valor = $Escort->valor_normal;					
				if($Escort->idPromo != null && isset($Escort->idPromo)) $Promo=$Escort->idPromo;
				if($Escort->peso!=null && isset($Escort->peso) && strlen($Escort->peso)>0) $Peso = $Escort->peso.' kg';
				if($Escort->valor_normal!=null && isset($Escort->valor_normal) && strlen($Escort->valor_normal)>0) {
					$Valor = $Escort->valor_normal;					
					$Valor = $Valor/1000;
					$Valor = '$ '.$Valor.'.000';
				}
				if($Escort->altura!=null && isset($Escort->altura)) $Altura = $Escort->altura.' cm';
				if($Escort->medidas!=null && isset($Escort->medidas)) $Medidas = $Escort->medidas;
				if($Escort->nombre_artistico!=null && isset($Escort->nombre_artistico)) $Nombre = $Escort->nombre_artistico;
				if($Escort->fecha_nac!=null && isset($Escort->fecha_nac) && strlen($Escort->fecha_nac)>0){ 
					$Edad = RelaxArica::DiferenciaFechas($Escort->fecha_nac,date("Y-m-d"));
					$Edad = $Edad[0].utf8_encode(' años');
				}
				if($Escort->detalle_servicios!=null && isset($Escort->detalle_servicios)) $Servicios = $Escort->detalle_servicios;
				
				echo '<li class="span2">
						  <div class="thumbnail mini-escort glow2">	        		
						    <div class="caption">
						        <p><b>Tel&eacute;fono:</b> '.$Telefono1.'</p>
								<p><b>Precio:</b> '.$Valor.'</p>
						        <p style="text-align:center;"><a href="#'.$idModal.'" role="button" data-toggle="modal" class="btn btn-inverse" rel="tooltip" title=""><i class="icon-eye-open"></i></a></p>
						    </div>
						    <img src="'.$Escort->foto_perfil.'" alt="">
						    <div class="escort-nombre"><h4 class="lusty" style="margin:0px; text-align:center;">'.$Nombre.'</h4></div>
						  </div>
				</li>';
				//Obtener la primera imagen 
				
				$PrimeraFoto = null;
				
				echo '<div id="'.$idModal.'" class="modal hide fade relax-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-header" style="background-color: #CCCCCC; text-shadow: 1px 1px #292C37;">
						    <button type="button" style="color: #292C37;" class="close" data-dismiss="modal" aria-hidden="true">x</button>
						    <h3 class="lusty" id="myModalLabel">'.$Nombre.'</h3>
						  </div>
						  <div class="modal-body">
						    <div class="span4" style="text-align: center;">
							<div style="width:300px;height:300px; text-align:center;"><img id="visor-foto-'.$Escort->idEscort.'" class="img-rounded visor-foto" src="'.$Escort->foto_perfil.'" alt='.$Nombre.'></div>
						    <div class="row-fluid" style="padding-top: 10px;">';
				echo '<div class="span2"><img escort="'.$Escort->idEscort.'" class="fotos glow2 img-rounded" src="'.$Escort->foto_perfil.'" alt='.$Nombre.'></div>';
				$Fotos = EscortImg::model()->findAllByAttributes(array('idEscort'=>$Escort->idEscort, 'estado'=>'2'));
				if(count($Fotos)>0){
					foreach($Fotos as $Foto) {
						echo '<div class="span2"><img class="fotos glow2 img-rounded" escort="'.$Escort->idEscort.'" src="'.$Foto->URL.'" alt='.$Nombre.'></div>';
					}
				}				
				echo '</div>
							</div>
							<div class="span4">
								<p><b>Descripci&oacute;n: </b>'.$Escort->descripc.'</p>
								<p><b>Promoci&oacute;n: </b>'.$Promo.'</p>
					    		<p><b>Edad: </b>'.$Edad.'</p>
					    		<p><b>Peso: </b>'.$Peso.'</p>
							    <p><b>Altura: </b>'.$Altura.'</p>
							    <p><b>Medidas: </b>'.$Medidas.'</p>
							  	<p><b>Tel&eacute;fono: </b>'.$Telefono1.'</p>
							    <p><b>Tel&eacute;fono: </b>'.$Telefono2.'</p>
							    <p><b>Servicios: </b>'.$Servicios.'</p>
					    	</div>
						  </div>
						</div>';
		}	
	?>
	</ul>
</div>

<?php /*$this->endWidget();*/ ?>
<?php /*echo '<center><img width="60%" src="' . Yii::app()->request->baseUrl . '/images/Pronto-RelaxArica.png" /></center>';*/?>
<?php /*if(isset(Yii::app()->user->id)) var_dump(Yii::app()->user->esAdmin()); */?>
