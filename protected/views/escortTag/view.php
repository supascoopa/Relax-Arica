<?php
$this->breadcrumbs=array(
	'Escort Tags'=>array('index'),
	$model->idEscort_etiquetas,
);

$this->menu=array(
	array('label'=>'List EscortTag','url'=>array('index')),
	array('label'=>'Create EscortTag','url'=>array('create')),
	array('label'=>'Update EscortTag','url'=>array('update','id'=>$model->idEscort_etiquetas)),
	array('label'=>'Delete EscortTag','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idEscort_etiquetas),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EscortTag','url'=>array('admin')),
);
?>

<h1>View EscortTag #<?php echo $model->idEscort_etiquetas; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idEscort_etiquetas',
		'idEtiqueta',
		'idEscort',
	),
)); ?>
