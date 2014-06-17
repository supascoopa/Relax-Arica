<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',);
?>

<h1>Iniciar <?php echo utf8_encode('Sesión');?></h1>
<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),)); ?>
	<p class="note">Los campos con <span class="required">*</span> son necesarios.</p>
	
	<div class="row">
	<?php echo $form->textFieldRow($model,'login'); ?>
	<?php echo $form->error($model,'login'); ?>
	</div>
	<div class="row">
	<?php echo $form->passwordFieldRow($model,'pass'); ?>
	<?php echo $form->error($model,'pass'); ?>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'Entrar',
        )); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
