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
	
}
?>