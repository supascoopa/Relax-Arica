<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->idUsuario,
);

$this->menu=array(
	array('label'=>'Listar Usuarios','url'=>array('index')),
	array('label'=>'Crear Usuario','url'=>array('create')),
	array('label'=>'Modificar Usuario','url'=>array('update','id'=>$model->idUsuario)),
	array('label'=>'Eliminar Usuario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idUsuario),'confirm'=>'Esta seguro de eliminar este Usuario?')),
	array('label'=>'Administrar Usuarios','url'=>array('admin')),
);
?>

<h1>Perfil  <?php /*echo $model->idUsuario;*/ ?></h1>
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
