<?php
$this->breadcrumbs=array(
	'Etiquetas'=>array('index'),
	$model->idEtiqueta=>array('view','id'=>$model->idEtiqueta),
	'Update',
);

$this->menu=array(
	array('label'=>'List Etiqueta','url'=>array('index')),
	array('label'=>'Create Etiqueta','url'=>array('create')),
	array('label'=>'View Etiqueta','url'=>array('view','id'=>$model->idEtiqueta)),
	array('label'=>'Manage Etiqueta','url'=>array('admin')),
);
?>

<h1>Update Etiqueta <?php echo $model->idEtiqueta; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>