<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->idUsuario=>array('view','id'=>$model->idUsuario),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Listar Usuarios','url'=>array('index')),
	array('label'=>'Crear Usuario','url'=>array('create')),
	array('label'=>'Ver Usuario','url'=>array('view','id'=>$model->idUsuario)),
	array('label'=>'Administrar Usuarios','url'=>array('admin')),
);
?>

<h1>Modificar Usuario <?php echo $model->idUsuario; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>