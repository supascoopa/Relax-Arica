<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'escort-tag-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php /*echo $form->textFieldRow($model,'idEscort',array('class'=>'span5'));*/ 
		$Pregunta = "Escoja Escort";
		$Escorts = EscortPerfil::model()->findAll();

		if(count($Escorts) == 0) $Pregunta = "No hay perfil de Escorts";
			
		$ListaEscorts= CHtml::listData($Escorts, 'idEscort', 'nombre_artistico');
		echo $form->dropDownListRow($model,'idEscort',$ListaEscorts,array('class'=>'span5', 'prompt'=>$Pregunta));		
	?>
	
	<?php /*echo $form->textFieldRow($model,'idEtiqueta',array('class'=>'span5'));*/
		$Pregunta = "Escoja Etiqueta";
		$Etiquetas = Etiqueta::model()->findAll();
		
		if(count($Etiquetas) == 0) $Pregunta = "No hay Etiquetas";
			
		$ListaEtiquetas= CHtml::listData($Etiquetas, 'idEtiqueta', 'Etiqueta');
		echo $form->dropDownListRow($model,'idEtiqueta',$ListaEtiquetas,array('class'=>'span5', 'prompt'=>$Pregunta));
	?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
