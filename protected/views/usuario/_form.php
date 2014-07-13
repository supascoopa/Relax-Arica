<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son necesarios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>45)); ?>

	<?php if(Yii::app()->user->esAdmin()) echo $form->textFieldRow($model,'login',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->passwordFieldRow($model,'pass',array('class'=>'span5','maxlength'=>50)); ?>
	
	<?php echo $form->label($model, utf8_encode('Repita Contraseña'));?>
	<?php 
		if(!$model->isNewRecord) $model->pass_repeat = $model->pass;
		echo $form->passwordField($model,'pass_repeat',array('class'=>'span5','maxlength'=>50)); ?>    
	<?php echo $form->error($model,'pass_repeat'); ?> 

	<?php /*echo $form->textFieldRow($model,'tipo',array('class'=>'span5'));*/
		if(Yii::app()->user->esAdmin()) echo $form->dropDownListRow($model,'tipo', array('2'=>'Escort', '1'=>'Cliente', '0'=>'Administrador'),array('class'=>'span5'));
	?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
