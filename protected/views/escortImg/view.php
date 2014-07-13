<?php
$breacrumbs = array('Fotos'=>array('index'),$model->idEscort_IMG,); 
if(Yii::app()->user->esEscort()) $breacrumbs = array('Mis Fotos'=>array('MisFotos'),$model->idEscort_IMG,); 

$this->breadcrumbs=$breacrumbs;
$cont = RelaxArica::contarFotosConfirmar();
$this->menu=array(
	array('label'=>'Mis Fotos','url'=>array('MisFotos'), 'visible'=>Yii::app()->user->esEscort()),
	array('label'=>'Administrar Fotos('.$cont.')','url'=>array('AdministrarFotos'), 'visible'=>Yii::app()->user->esAdmin()),
	array('label'=>'Listar Fotos','url'=>array('index'), 'visible'=>Yii::app()->user->esAdmin()),	
	array('label'=>'Subir Foto','url'=>array('create'), 'visible'=>Yii::app()->user->esAdmin()),
	array('label'=>'Modificar Foto','url'=>array('update','id'=>$model->idEscort_IMG)),
	array('label'=>'Eliminar Foto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idEscort_IMG),'confirm'=>'Deseas eliminar esta foto?')),
	array('label'=>'Administar Fotos','url'=>array('admin'), 'visible'=>false),
	
);
?>

<h1>Ficha Foto <?php if(Yii::app()->user->esAdmin()) echo '#'.$model->idEscort_IMG; ?></h1>
<div class="row">
	<div class="span3 center-block">
		<?php 
			echo '<img src="'.$model->URL.'"  style="margin: 15px 0 0 10px; max-width:250px; max-height:250px; width:auto; height:auto;">';
		?>
	</div>

<div class="span5">
<br/>
<?php 
	$model->estado = RelaxArica::EstadoFoto($model->estado);
	$this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idEscort_IMG',
		'URL',
		'titulo',
		'fecha_subida',
		'estado',
		/*'idEscort',*/
		array(
				'name'=>'Escort',
				'type'=>'raw',
				'value'=>RelaxArica::LinkPerfilEscort($model->idEscort),
		),
	),
)); ?>
</div>
</div>
