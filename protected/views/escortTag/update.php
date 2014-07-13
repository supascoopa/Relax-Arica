<?php
$this->breadcrumbs=array(
	'Escort Tags'=>array('index'),
	$model->idEscort_etiquetas=>array('view','id'=>$model->idEscort_etiquetas),
	'Update',
);

$this->menu=array(
	array('label'=>'List EscortTag','url'=>array('index')),
	array('label'=>'Create EscortTag','url'=>array('create')),
	array('label'=>'View EscortTag','url'=>array('view','id'=>$model->idEscort_etiquetas)),
	array('label'=>'Manage EscortTag','url'=>array('admin')),
);
?>

<h1>Update EscortTag <?php echo $model->idEscort_etiquetas; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>