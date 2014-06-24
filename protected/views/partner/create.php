<?php
$this->breadcrumbs=array(
	'Partners'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Partners','url'=>array('index')),
	array('label'=>'Administar Partners','url'=>array('admin')),
);
?>

<h1>Crear Partner</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>