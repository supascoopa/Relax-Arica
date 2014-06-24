<?php
$this->breadcrumbs=array(
	'Partners'=>array('index'),
	$model->idPartners,
);

$this->menu=array(
	array('label'=>'Listar Partners','url'=>array('index')),
	array('label'=>'Crear Partner','url'=>array('create')),
	array('label'=>'Modificar Partner','url'=>array('update','id'=>$model->idPartners)),
	array('label'=>'Eliminar Partner','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idPartners),'confirm'=>'Esta seguro de eliminar el partner?')),
	array('label'=>'Administrar Partners','url'=>array('admin')),
);
?>

<h1>Informaci&oacute;n Partner <?php /*echo $model->idPartners;*/ ?></h1>

<?php 	
	$model->tipo = RelaxArica::TipoPartner($model->tipo);
	$this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'type'=>'condensed',
	'htmlOptions'=>array('class'=>'tabla'),
	'attributes'=>array(
		'idPartners',
		'URL',
		'nombre',
		'tipo',
		'fecha_inscrip',
	),
)); ?>
