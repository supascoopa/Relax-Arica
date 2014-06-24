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
}