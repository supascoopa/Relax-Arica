<?php

class EscortImgController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update','admin','delete','SubirFoto','AdministrarFotos', 'AdminSolic'),
				'expression'=>'Yii::app()->user->esAdmin()',
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','MisFotos','delete','SubirFoto'),
				'expression'=>'Yii::app()->user->esEscort()',
			),
			array('allow', // 
					'actions'=>array('view','update'),
					'expression'=>'Yii::app()->user->esEscort() && Yii::app()->user->esPropietario()',
			),
			array('deny', // allow authenticated user to perform 'create' and 'update' actions
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
		$model=new EscortImg;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EscortImg']))
		{
			$model->attributes=$_POST['EscortImg'];
			$model->fecha_subida=date("Y-m-d H:i:s");
			if(Yii::app()->user->esAdmin()){
				$model->estado=2; //0 deshabilitada, 1 esperando confirmación, 2 habilitada
			}
			else {
				$model->estado=1;
				$model->idEscort = Yii::app()->user->id;
			}
			
			//Muevo el archivo temporal a la carpeta correspondiente
			if(isset($model->URL) && isset($model->idEscort)){
				$Archivo = $model->URL;
				$Separador='/'; $Exito = false;
				$Dir = str_replace('\\', '/', dirname(dirname(dirname(dirname(__FILE__)))));
				$Home= str_replace('\\', '/', dirname(dirname(dirname(__FILE__))));
				
				for($i=strlen($Archivo)-1;$i>0;$i--) if($Archivo[$i] == '\\' || $Archivo[$i] == '/') {break;}
				$Foto = substr($Archivo, $i+1);
				$Antiguo = $Home.'/images/Temp/'.$Foto;
				$NuevoDir = 'images'.$Separador.'Fotos'.$Separador.$model->idEscort.$Separador;
				if(!is_dir($NuevoDir)) mkdir($NuevoDir);
				
				if(!file_exists($Home.$Separador.$NuevoDir.$Foto) && file_exists($Antiguo)) 
					$Exito = rename($Antiguo,$Home.$Separador.$NuevoDir.$Foto);
				
				if($Exito) $model->URL = str_replace($Separador,'/',Yii::app()->baseUrl.'/'.$NuevoDir.$Foto);
			}
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->idEscort_IMG));
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

		if(isset($_POST['EscortImg']))
		{
			$model->attributes=$_POST['EscortImg'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idEscort_IMG));
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
			$model = $this->loadModel($id);
			if(isset($model->URL)) if(file_exists($model->URL)) unlink($model->URL);
			// we only allow deletion via POST request
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('EscortImg');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EscortImg('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EscortImg']))
			$model->attributes=$_GET['EscortImg'];

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
		$model=EscortImg::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='escort-img-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionSubirFoto(){
		$file = CUploadedFile::getInstanceByName('file');		
		$Ext = strtolower($file->getExtensionName());
		if($Ext == "jpg" || $Ext == "jpeg" || $Ext == "png" ){		
				$Dir='images/Temp/';								
				$NuevoNombre = RelaxArica::StringAleatorio().'.'.$Ext;					
					
				while(file_exists($Dir.$NuevoNombre)) $NuevoNombre = RelaxArica::StringAleatorio().'.'.$Ext;			
				
				$urlImagen = $Dir.$NuevoNombre;
				
				$Resultado = $file->saveAs($urlImagen); 
				
				echo Yii::app()->baseUrl.'/'.$urlImagen;
		}
		else {
			$Foto = Yii::app()->request->baseUrl . '/images/perfil.jpg';
						
			echo $Foto;
		}
	}
	
	public function actionMisFotos()
	{
		$id = Yii::app()->user->id;
		
		$criterio=new CDbCriteria(array(
				'order'=>'fecha_subida desc',
				'condition'=>'idEscort='.$id,));
		
		$dataProvider=new CActiveDataProvider('EscortImg', array(
				'criteria'=>$criterio,));
		
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionAdministrarFotos()
	{	
		$criterio=new CDbCriteria(array(
				'order'=>'fecha_subida asc',
				'condition'=>'estado=1',));
	
		$dataProvider=new CActiveDataProvider('EscortImg', array(
				'criteria'=>$criterio,));
	
		$this->render('adminfotos',array(
				'dataProvider'=>$dataProvider,
		));
	}	
	public function actionAdminSolic()
	{
		if(isset($_POST)){
			if(Yii::app()->user->esAdmin()){				
				$json = json_decode($_POST['json']);
				if(isset($json) && count($json)>0){
					$id = $json[0];
					$accion = $json[1];
					
					$model=$this->loadModel($id);
					if($accion == "0") $model->estado = "0"; // Se rechaza la foto
					else $model->estado = "2"; // Se acepta
								
					if($model->save()) echo '1'; //Indica que el cambio se realizó	
					else echo '0';
				}	
			}
		}
	}
}
