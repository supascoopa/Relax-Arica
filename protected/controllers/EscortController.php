<?php

class EscortController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // Permite al administrador todas las acciones
				'actions'=>array('index','view','SubirFotoPerfil','create','update','admin','delete'),
				'expression'=>'Yii::app()->user->esAdmin()',
			),
			array('allow', // Permite al usuario autenticado crear y actualizar su perfil
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('deny',  // Rechaza a todos los otros usuarios
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new EscortPerfil;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EscortPerfil']))
		{
			$model->attributes=$_POST['EscortPerfil'];
			$model->fecha_inscrip=date("Y-m-d H:i:s");
			if($model->save())
				$this->redirect(array('view','id'=>$model->idEscort));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EscortPerfil']))
		{
			$model->attributes=$_POST['EscortPerfil'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idEscort));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('EscortPerfil');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EscortPerfil('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EscortPerfil']))
			$model->attributes=$_GET['EscortPerfil'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=EscortPerfil::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='escort-perfil-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionSubirFotoPerfil(){
		$file = CUploadedFile::getInstanceByName('file');
		// Do your business ... save on file system for example,
		// and/or do some db operations for example
		if($file->getExtensionName() == "jpg" || $file->getExtensionName() == "jpeg" || $file->getExtensionName() == "png" ){
			$urlImagen = 'images/'.$file->getName();
			$file->saveAs($urlImagen);
			$Imagen = new ResizeImage($urlImagen);    
		    $Imagen->resizeTo(130, 130, 'exact');    
		    $Imagen->saveImage($urlImagen);
			// return the new file path
			echo Yii::app()->baseUrl.'/'.$urlImagen;
		}
		else {
			if(isset(Yii::app()->user->id)){
				$Usuario = Usuario::model()->findByAttributes(array('idUsuario'=>Yii::app()->user->id));
			}
			$Foto = $Foto = Yii::app()->request->baseUrl . '/images/perfil.jpg';
			echo $Foto;
		}
	}
}
