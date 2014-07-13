<?php
$this->breadcrumbs=array(
	'Fotos'=>array('index'),
	$model->idEscort_IMG=>array('view','id'=>$model->idEscort_IMG),
	'Modificar',
);
$cont = RelaxArica::contarFotosConfirmar();
$this->menu=array(
	array('label'=>'Administrar Fotos('.$cont.')','url'=>array('AdministrarFotos'), 'visible'=>Yii::app()->user->esAdmin()),
	array('label'=>'Listar Fotos','url'=>array('index')),
	array('label'=>'Subir Foto','url'=>array('create')),
	array('label'=>'Ver Ficha','url'=>array('view','id'=>$model->idEscort_IMG)),
	array('label'=>'Administrar Fotos','url'=>array('admin'), 'visible'=>false),
);
?>

<h1>Modificando Foto #<?php echo $model->idEscort_IMG; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>