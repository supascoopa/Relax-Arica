<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'partner-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son necesarios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'URL',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>50)); ?>

	<?php /*echo $form->textFieldRow($model,'tipo',array('class'=>'span5'));*/
		echo $form->dropDownListRow($model,'tipo', array('0'=>'Motel', '1'=>'Spa', '2'=>'Masajes', '3'=>'Agencia'),array('class'=>'span5'));
	?>

	<?php /*echo $form->textFieldRow($model,'fecha_inscrip',array('class'=>'span5'));*/
	?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
