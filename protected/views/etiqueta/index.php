<?php
$this->breadcrumbs=array(
	'Etiquetas',
);

$this->menu=array(
	array('label'=>'Create Etiqueta','url'=>array('create')),
	array('label'=>'Manage Etiqueta','url'=>array('admin')),
);
?>

<h1>Etiquetas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
