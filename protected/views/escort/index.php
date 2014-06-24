<?php
$this->breadcrumbs=array(
	'Escorts',
);

$this->menu=array(
	array('label'=>'Crear Perfil','url'=>array('create'),'visible'=>Yii::app()->user->esAdmin()),
	array('label'=>'Administrar Perfiles','url'=>array('admin'),'visible'=>Yii::app()->user->esAdmin()),
);
?>

<h1>Escorts</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
