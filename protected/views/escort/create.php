<?php
$this->breadcrumbs=array(
	'Escorts'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Perfiles','url'=>array('index')),
	array('label'=>'Administrar Perfiles','url'=>array('admin')),
);
?>

<h1>Crear Perfil</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>