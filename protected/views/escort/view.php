<?php
$this->breadcrumbs=array(
	'Escorts'=>array('index'),
	$model->idEscort,
);

$this->menu=array(
	array('label'=>'Listar Escorts','url'=>array('index')),
	array('label'=>'Crear Perfil','url'=>array('create')),
	array('label'=>'Modificar Perfil','url'=>array('update','id'=>$model->idEscort)),
	array('label'=>'Eliminar Perfil','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idEscort),'confirm'=>'Esta seguro de eliminar el perfil de Escort?')),
	array('label'=>'Administrar Escorts','url'=>array('admin')),
);
?>

<h1>Perfil <?php /*echo $model->idEscort;*/ ?></h1>
<div class="span2"><img src="/RelaxArica/images/descarga.jpg?1403169395850" style="margin: 15px 0 0 10px;" alt="" class="img-circle"></div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
		'type'=>'condensed',
		'htmlOptions'=>array('class'=>'tabla span4'),
	'attributes'=>array(
		'idEscort',
		'nombre_artistico',
		'email',		
		/*'fecha_inscrip',*/
		'idPromo',
		/*'fecha_caduc',*/
		'fecha_nac',
		'peso',
		'altura',
		'medidas',
		'detalle_servicios',
		'horario',
		'tel_1',
		'tel_2',
		'valor_normal',
		'escort_eval_id',
		/*'estado',*/
		'descripc',
		/*'foto_perfil',*/
	),
)); ?>
