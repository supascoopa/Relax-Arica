<?php
$this->breadcrumbs=array(
	'Etiquetas'=>array('index'),
	$model->idEtiqueta,
);

$this->menu=array(
	array('label'=>'List Etiqueta','url'=>array('index')),
	array('label'=>'Create Etiqueta','url'=>array('create')),
	array('label'=>'Update Etiqueta','url'=>array('update','id'=>$model->idEtiqueta)),
	array('label'=>'Delete Etiqueta','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idEtiqueta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Etiqueta','url'=>array('admin')),
);
?>

<h1>View Etiqueta #<?php echo $model->idEtiqueta; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idEtiqueta',
		'Etiqueta',
	),
)); ?>
