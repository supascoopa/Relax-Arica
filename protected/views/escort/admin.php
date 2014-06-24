<?php
$this->breadcrumbs=array(
	'Escorts'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Escorts','url'=>array('index')),
	array('label'=>'Crear Escort','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('escort-perfil-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Escorts</h1>

<p>
Se pueden agregar opcionalmente operadores de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> o <b>=</b>) en el inicio de cada valor b&uacute;scado para especificar como la comparaci&oacute;n debe ser hecha.
</p>

<?php echo CHtml::link(utf8_encode('Búsqueda Avanzada'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'escort-perfil-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		/*'idEscort',*/
		'email',
		'nombre_artistico',
		'fecha_inscrip',
		/*'idPromo',*/
		'fecha_caduc',
		/*
		'fecha_nac',
		'peso',
		'altura',
		'medidas',
		'detalle_servicios',
		'horario',*/
		'tel_1',
		/*'tel_2',*/
		'valor_normal',
		/*'escort_eval_id',*/
		'estado',
		/*'descripc',
		'foto_perfil',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			/*'htmlOptions'=>array('class'=>'icon-white'),*/
		),
	),
)); ?>
