<?php
$this->breadcrumbs=array(
	'Fotos'=>array('index'),
	'Subir',
);
$cont = RelaxArica::contarFotosConfirmar();
$this->menu=array(
	array('label'=>'Listar Fotos','url'=>array('index')),
	array('label'=>'Administrar Fotos','url'=>array('admin'), 'visible'=>false),
	array('label'=>'Administrar Fotos('.$cont.')','url'=>array('AdministrarFotos'), 'visible'=>Yii::app()->user->esAdmin()),
);
?>

<h1>Subir Foto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>