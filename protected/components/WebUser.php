<?php
// Esta clase es usada para agregar funciones de usuario 
// Ej: Comprobar si el usuario es Administrador

class WebUser extends CWebUser{
	// Almacenar el modelo para no repetir la consulta.
	private $_modelo;
	
	// Retorna el nombre del Usuario
	function getNombre(){
		$Usuario = $this->cargarUsuario(Yii::app()->user->id);
		return $Usuario->nombre;
	}
	
	// Retorna si el usuario es Administrador
	function esAdmin(){
		$Usuario = $this->cargarUsuario(Yii::app()->user->id);
		if($Usuario !== null){
			if($Usuario->tipo == 0) return true;
			else return false;
		}
		else return false;
	}
	
	// Retorna si el usuario es Escort
	function esEscort(){
		$Usuario = $this->cargarUsuario(Yii::app()->user->id);
		if($Usuario !== null){
			if($Usuario->tipo == 2) return true;
			else return false;
		}
		else return false;
	}	

	function getTipo(){
		$Usuario = $this->cargarUsuario(Yii::app()->user->id);
		return $Usuario->tipo;
	}
	
	// Carga el modelo del usuario.
	protected function cargarUsuario($id=null)
	{
		if($this->_modelo===null)
		{
			if($id!==null)
				$this->_modelo=Usuario::model()->findByPk($id);
		}
		return $this->_modelo;
	}
	
	public function esPropietario(){ //Aqui defino todas las reglas de acceso para los controladores
		$Contexto = Yii::app()->controller->id;
		$Accion = Yii::app()->controller->action->id;
		
		if(isset($Contexto) && isset($Accion)){
			switch($Contexto){
				case 'usuario':{
					if($Accion == 'view' || $Accion == 'update') if(Yii::app()->user->id == $_GET['id']) return true;
					break;
				}
				case 'escort':{
					if($Accion == 'create'){ //Si la escort no tiene perfil y está recien accediendo
						$Escort = EscortPerfil::model()->findByAttributes(array('idEscort'=>Yii::app()->user->id));
						if(count($Escort)==0) return true;
					}
					else if($Accion == 'view' || $Accion == 'update') {
						if(Yii::app()->user->id == $_GET['id']) return true;
					}
					break;
				}
				case 'escortImg':{
					if($Accion == 'view' || $Accion == 'update'){ //Si la escort quiere ver sus fotos
						$Foto = EscortImg::model()->findByAttributes(array('idEscort_IMG'=>$_GET['id']));
						if(Yii::app()->user->id == $Foto->idEscort) return true;
					}
					
					break;
				}
			}
		}
		
		return false;
	}

	// Retorna si el usuario es Escort
	function tienePerfilEscort(){
		$Escort = EscortPerfil::model()->findByAttributes(array('idEscort'=>Yii::app()->user->id));
		
		if($Escort == null) return false;
		else return true;
	}
	
}
?>