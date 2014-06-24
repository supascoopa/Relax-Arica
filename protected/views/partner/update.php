<?php
$this->breadcrumbs=array(
	'Partners'=>array('index'),
	$model->idPartners=>array('view','id'=>$model->idPartners),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Listar Partners','url'=>array('index')),
	array('label'=>'Crear Partner','url'=>array('create')),
	array('label'=>'Ver Partner','url'=>array('view','id'=>$model->idPartners)),
	array('label'=>'Administar Partners','url'=>array('admin')),
);
?>

<h1>Modificar Partner <?php /*echo $model->idPartners; */?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>