<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->nombre,
);
$Etiqueta = "Modifica Usuario";
if(Yii::app()->user->esPropietario()) $Etiqueta = "Modificar mis datos";

$this->menu=array(
	array('label'=>'Listar Usuarios','url'=>array('index'), 'visible'=>Yii::app()->user->esAdmin()),
	array('label'=>'Crear Usuario','url'=>array('create'), 'visible'=>Yii::app()->user->esAdmin()),
	array('label'=>$Etiqueta,'url'=>array('update','id'=>$model->idUsuario), 'visible'=>Yii::app()->user->esPropietario() || Yii::app()->user->esAdmin()),
	array('label'=>'Eliminar Usuario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idUsuario),'confirm'=>'Esta seguro de eliminar este Usuario?'), 'visible'=>Yii::app()->user->esAdmin()),
	array('label'=>'Administrar Usuarios','url'=>array('admin'), 'visible'=>Yii::app()->user->esAdmin()),
);
?>

<h1>Cuenta  <?php /*echo $model->idUsuario;*/ ?></h1>
<?php 
	if($model->tipo == 0) $model->tipo = "Administrador";
	elseif($model->tipo == 1) $model->tipo = "Cliente";
	elseif($model->tipo == 2) $model->tipo = "Escort";
?>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'type'=>'condensed',
	'htmlOptions'=>array('class'=>'tabla'),
	'attributes'=>array(
		'idUsuario',
		'nombre',
		'login',
		'pass',
		'tipo',
	),
)); ?>
