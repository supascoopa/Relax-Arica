<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'idEscort',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'nombre_artistico',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'fecha_inscrip',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'idPromo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_caduc',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_nac',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'peso',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'altura',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'medidas',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'detalle_servicios',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'horario',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'tel_1',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'tel_2',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'valor_normal',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'escort_eval_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'estado',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'descripc',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'foto_perfil',array('class'=>'span5','maxlength'=>200)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
