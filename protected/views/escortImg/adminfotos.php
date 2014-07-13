<?php
$this->breadcrumbs=array(
	'Administrar Fotos',
);

$this->menu=array(
		array('label'=>'Listar Fotos','url'=>array('index'), 'visible'=>Yii::app()->user->esAdmin()),
		array('label'=>'Subir Foto','url'=>array('create')),		
		array('label'=>'Manage Foto','url'=>array('admin'), 'visible'=>false),
);
?>

<h1>Administrar Fotos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view_admin',
)); ?>
