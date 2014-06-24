<?php
$this->breadcrumbs=array(
	'Escorts'=>array('index'),
	$model->idEscort=>array('view','id'=>$model->idEscort),
	'Modificando',
);

$this->menu=array(
	array('label'=>'Listar Escorts','url'=>array('index')),
	array('label'=>'Crear Perfil','url'=>array('create')),
	array('label'=>'Ver Perfiles','url'=>array('view','id'=>$model->idEscort)),
	array('label'=>'Administrar Perfiles','url'=>array('admin')),
);
?>

<h1>Modificando Perfil <?php /*echo $model->idEscort;*/ ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
