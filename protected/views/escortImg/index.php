<?php
$this->breadcrumbs=array(
	'Fotos',
);
$cont = RelaxArica::contarFotosConfirmar();
$this->menu=array(
	array('label'=>'Subir Foto','url'=>array('create')),
	array('label'=>'Administrar Fotos('.$cont.')','url'=>array('AdministrarFotos'), 'visible'=>Yii::app()->user->esAdmin()),
	array('label'=>'Manage Foto','url'=>array('admin'), 'visible'=>false),
);
?>

<h1><?php if(Yii::app()->user->esEscort()) echo 'Mis ';?>Fotos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
