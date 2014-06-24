<?php
$this->breadcrumbs=array(
	'Partners'=>array('index'),
	'Administar',
);

$this->menu=array(
	array('label'=>'Listar Partners','url'=>array('index')),
	array('label'=>'Crear Partner','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('partner-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Partners</h1>

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
	'id'=>'partner-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idPartners',
		'URL',
		'nombre',
		'tipo',
		'fecha_inscrip',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
