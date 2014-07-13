<?php
class RelaxArica{
	public static function FotoPerfil($id){
		$Foto = Yii::app()->request->baseUrl . '/images/perfil.jpg';
			
		if(isset($id)){
			$Usuario = Usuario::model()->findByAttributes(array('idUsuario'=>$id));
			if($Usuario->tipo == 2){
				$Escort = EscortPerfil::model()->findByAttributes(array('idEscort'=>$id));
				if($Escort !== null){
					if(isset($Escort->foto_perfil) && $Escort->foto_perfil !== "") $Foto=$Escort->foto_perfil;
				}
			}
		}
			
		return $Foto;
	}
	public static function TipoPartner($id){
		$Partner = "Desconocido";
		switch($id){
			case 0:
				$Partner = "Motel";
				break;
			case 1:
				$Partner = "Spa";
				break;
			case 2:
				$Partner = "Masajes";
				break;
			case 3:
				$Partner = "Agencia";
				break;
		}			
		return $Partner;
	}
	
	public static function EstadoFoto($id){
		$Estado = "Desconocido";
		switch($id){
			case 0:
				$Estado = "Deshabilitada";
				break;
			case 1:
				$Estado = utf8_encode("Esperando confirmación");
				break;
			case 2:
				$Estado = "Habilitada";
				break;
		}
		return $Estado;
	}
	
	public static function LinkPerfilEscort($id){
		$Link = '<a href="#"></a>';
		$Escort = EscortPerfil::model()->findByAttributes(array('idEscort'=>$id));
		Yii::app()->createAbsoluteUrl('site/index', array());
		$Link = CHtml::link($Escort->nombre_artistico, Yii::app()->createAbsoluteUrl('escort/'.$Escort->idEscort));
		
		return $Link;
	}
	
	public static function StringAleatorio($length = 10) {
		$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$aleatorio = '';
		for ($i = 0; $i < $length; $i++) {
			$aleatorio .= $caracteres[rand(0, strlen($caracteres) - 1)];
		}
		return $aleatorio;
	}
	//Retorna un arreglo con la diferencia en año, meses y dias
	public static function DiferenciaFechas($fecha1, $fecha2){
		$fecha1 = strtotime($fecha1);
		$fecha2 = strtotime($fecha2);
		if ($fecha1 === false || $fecha1 < 0 || $fecha2 === false || $fecha2 < 0 || $fecha1 > $fecha2)
			return false;
		 
		$years = date('Y', $fecha2) - date('Y', $fecha1);
		 
		$endMonth = date('m', $fecha2);
		$startMonth = date('m', $fecha1);
		 
		// Calculate months
		$months = $endMonth - $startMonth;
		if ($months <= 0)  {
			$months += 12;
			$years--;
		}
		if ($years < 0)
			return false;
		 
		// Calculate the days
		$offsets = array();
		if ($years > 0)
			$offsets[] = $years . (($years == 1) ? ' año' : ' años');
		if ($months > 0)
			$offsets[] = $months . (($months == 1) ? ' mes' : ' meses');
		$offsets = count($offsets) > 0 ? '+' . implode(' ', $offsets) : 'ahora';
		
		$days = $fecha2 - strtotime($offsets, $fecha1);
		$days = date('z', $days);
		 
		return array($years, $months, $days);
			
	}
	
	public static function contarFotosConfirmar(){
		$Fotos = EscortImg::model()->countByAttributes(array('estado'=>'1'));
		
		if(isset($Fotos)) return $Fotos;
 		
		return 0;
	}
}