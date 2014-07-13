<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'idEscort_IMG',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'URL',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'titulo',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'fecha_subida',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'estado',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'idEscort',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
