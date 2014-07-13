<?php 
	Yii::app()->clientScript->registerScript('Perfil', "	
		$('#btnEnviar').click(function(){
			var img = $('#Foto').attr('src');
			$('#EscortImg_URL').val(img);
		});
		if($('#image-select-loading-".$this->id."').show())
			");
	
		$id=null;
		if(Yii::app()->user->esEscort()) $id = Yii::app()->user->id;
	
		if($model->isNewRecord){
			echo '<div class="span3" style="padding-bottom: 20px;">';
			$this->widget('ext.imageSelect.ImageSelect',  array(
					'path'=>RelaxArica::FotoPerfil(null),
					'alt'=>'Subir Foto',
					'uploadUrl'=>$this->createUrl('escortImg/SubirFoto', array('file'=>'perfil', 'id'=>$id)),
					'htmlOptions'=>array('id'=>'Foto'),
					));
			echo '</div>';
		}	
	?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'escort-img-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php 
	if(!$model->isNewRecord){
		echo '<div class="span3" style="padding-bottom: 20px;">';
		echo '<img id="Foto" src="'.$model->URL.'" alt="'.$model->titulo.'">';
		echo '</div>';
		}
?>


	<div class="span5">
	<?php /*echo $form->textFieldRow($model,'URL',array('class'=>'span5','maxlength'=>100));*/ 
		echo $form->textField($model,'URL',array('class'=>'span5','maxlength'=>100,'style'=>'visibility:hidden;'));
	?>
	<p class="help-block">Los campos con <span class="required">*</span> son necesarios.</p>
	
	<?php echo $form->errorSummary($model); ?>
	
	<?php /*echo $form->textFieldRow($model,'idEscort',array('class'=>'span5'));*/
		if(Yii::app()->user->esAdmin() && $model->isNewRecord){ //Si el usuario es administrador
			$Pregunta = "Escoja Escort";
			$UsEscor = Usuario::model()->findAllByAttributes(array('tipo'=>'2'),array('order' => 'idUsuario DESC'));
			$Escorts = array();
			foreach($UsEscor as $Us){
				if(EscortPerfil::model()->countByAttributes(array('idEscort'=>$Us->idUsuario))!=0) array_push($Escorts, $Us);
			}
			if($Escorts == null) $Pregunta = "No hay perfil de Escorts";
				
			$ListaEscorts= CHtml::listData($Escorts, 'idUsuario', 'nombre');
			echo $form->dropDownListRow($model,'idEscort',$ListaEscorts,array('class'=>'span5', 'prompt'=>$Pregunta));
		}
	?>
		
	<?php echo $form->textFieldRow($model,'titulo',array('class'=>'span5','maxlength'=>100)); ?>

	<?php /*echo $form->textFieldRow($model,'fecha_subida',array('class'=>'span5'));*/?>

	<?php /*echo $form->textFieldRow($model,'estado',array('class'=>'span5'));*/ 
		if(Yii::app()->user->esAdmin())
			echo $form->dropDownListRow($model,'estado', array('2'=>'Habilitada', '1'=>utf8_encode('Esperando confirmación'), '0'=>'Deshabilitada'),array('class'=>'span5'));
	?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'htmlOptions'=>array('id'=>'btnEnviar'),
			'label'=>$model->isNewRecord ? 'Subir' : 'Actualizar',
		)); ?>
	</div>
	</div>

<?php $this->endWidget(); ?>
