<?php
$this->breadcrumbs=array(
	'Escorts'=>array('index'),
	$model->nombre_artistico,
);
$esAdmin = Yii::app()->user->esAdmin();
$esPropietario = Yii::app()->user->esPropietario();

if($esPropietario) $ModificarEtiq = "Modificar mi perfil";
else $ModificarEtiq = "Modificar Perfil";

$this->menu=array(
	array('label'=>'Listar Escorts','url'=>array('index'), 'visible'=>$esAdmin),
	array('label'=>'Crear Perfil','url'=>array('create'), 'visible'=>$esAdmin),
	array('label'=>$ModificarEtiq,'url'=>array('update','id'=>$model->idEscort)),
	array('label'=>'Eliminar Perfil','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idEscort),'confirm'=>'Esta seguro de eliminar el perfil de Escort?'), 'visible'=>$esAdmin),
	array('label'=>'Administrar Escorts','url'=>array('admin'), 'visible'=>$esAdmin),
);
?>

<h1>
<?php 
	if($esPropietario) echo 'Mi Perfil';
	else echo 'Perfil Escort #'.$model->idEscort;
	/*echo $model->idEscort;*/ 
?>
</h1>

<?php 
	$Foto = $model->foto_perfil;
	if(isset($Foto) && strlen($Foto)>0 && $Foto!=null)
		echo '<div class="span2"><img src="'.$Foto.'" style="margin: 15px 0 0 10px;" alt="" class="img-circle"></div>';
	else 
		echo '<div class="span2"><img src="'.Yii::app()->request->baseUrl .'/images/perfil.jpg" style="margin: 15px 0 0 10px;" alt="" class="img-circle"></div>';
	
	if($model->estado == 0) $model->estado = "Deshabilitado";
	else $model->estado = "Habilitado";
	
	if($esAdmin){
		$atributos = array(
		'idEscort',
		'nombre_artistico',
		'email',
		'fecha_inscrip',
		'idPromo',
		'fecha_caduc',
		'fecha_nac',
		'peso',
		'altura',
		'medidas',
		'detalle_servicios',
		'horario',
		'tel_1',
		'tel_2',
		'valor_normal',
		'escort_eval_id',
		'estado',
		'descripc',
		'foto_perfil',
		);
	}
	else {
		$atributos = array(
		/*'idEscort',*/
		'nombre_artistico',
		'email',
		/*'fecha_inscrip',*/
		'idPromo',
		/*'fecha_caduc',*/
		'fecha_nac',
		'peso',
		'altura',
		'medidas',
		'detalle_servicios',
		'horario',
		'tel_1',
		'tel_2',
		'valor_normal',
		'escort_eval_id',
		/*'estado',*/
		'descripc',
		/*'foto_perfil',*/
		);
	}
	$this->widget('bootstrap.widgets.TbDetailView',array(
		'data'=>$model,
			'type'=>'condensed',
			'htmlOptions'=>array('class'=>'tabla span4'),
		'attributes'=>$atributos,
	)); ?>
