<?php 
	Yii::app()->clientScript->registerScript('Perfil', "
	$('#EscortPerfil_foto_perfil').hide();
			
	$('#btnEnviar').click(function(){
		var img = $('#FotoPerfil').attr('src');
		$('#EscortPerfil_foto_perfil').val(img);
	});
	");

	/*echo $form->labelEx($model,'foto_perfil');*/

	$this->widget('ext.imageSelect.ImageSelect',  array(
			'path'=>RelaxArica::FotoPerfil($model->idEscort),
			'alt'=>'Cambiar Foto',
			'uploadUrl'=>$this->createUrl('escort/subirfotoperfil', array('file'=>'perfil')),
					'htmlOptions'=>array('id'=>'FotoPerfil'),
	
	));

	$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'escort-perfil-form',
		'enableAjaxValidation'=>false,
	)); 
	echo $form->textField($model,'foto_perfil',array('class'=>'span5','maxlength'=>200,));
	
	echo'<div class="span7">';
 ?>

	<p class="help-block">Los campos con <span class="required">*</span> son necesarios.</p>

	<?php echo $form->errorSummary($model); ?>	
	
	<?php 
		/*echo $form->textFieldRow($model,'idEscort',array('class'=>'span5'));*/
		if(Yii::app()->user->esAdmin()){ //Si el usuario es administrador
			$Pregunta = "Escoja Escort"; 	
			$UsEscor = Usuario::model()->findAllByAttributes(array('tipo'=>'2'),array('order' => 'idUsuario DESC'));
			$Escorts = array();
			foreach($UsEscor as $Us){
				if(EscortPerfil::model()->countByAttributes(array('idEscort'=>$Us->idUsuario))==0) array_push($Escorts, $Us);
			}	
			if($Escorts == null) $Pregunta = "No hay perfil de Escorts";	
			
			$ListaEscorts= CHtml::listData($Escorts, 'idUsuario', 'nombre');
			echo $form->dropDownListRow($model,'idEscort',$ListaEscorts,array('class'=>'span5', 'prompt'=>$Pregunta));
		}
		else $model->idEscort = Yii::app()->user->id;
	 ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'nombre_artistico',array('class'=>'span5','maxlength'=>500)); ?>

	<?php /*echo $form->textFieldRow($model,'fecha_inscrip',array('class'=>'span5'));*/
		if(Yii::app()->user->esAdmin()){ //Si el usuario es administrador
			echo $form->labelEx($model,'fecha_inscrip');
			
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model' => $model,
					'attribute' => 'fecha_inscrip',
					'language' => 'es',
					'htmlOptions' => array(
							'size' => '10',         // textField size
							'maxlength' => '10',    // textField maxlength
							'class'=>'span5'
					),
					'options' => array(
							'dateFormat' => 'yy-mm-dd',
							'changeYear' => 'true',
							'changeMonth' => 'true',
							'monthNames' => array('Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre'),
							'yearRange'=>'2014:'.date('Y'),
					),
			));
		}
	?>

	<?php echo $form->textFieldRow($model,'idPromo',array('class'=>'span5')); ?>

	<?php /*echo $form->textFieldRow($model,'fecha_caduc',array('class'=>'span5'));*/
		if(Yii::app()->user->esAdmin()){ //Si el usuario es administrador
			echo $form->labelEx($model,'fecha_caduc');
				
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model' => $model,
					'attribute' => 'fecha_caduc',
					'language' => 'es',
					'htmlOptions' => array(
							'size' => '10',         // textField size
							'maxlength' => '10',    // textField maxlength
							'class'=>'span5'
					),
					'options' => array(
							'dateFormat' => 'yy-mm-dd',
							'changeYear' => 'true',
							'changeMonth' => 'true',
							'monthNames' => array('Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre'),
							'yearRange'=>'2014:'.date('Y'),
					),
			));
		}
	?>

	<?php /*echo $form->textFieldRow($model,'fecha_nac',array('class'=>'span5')); */
		echo $form->labelEx($model,'fecha_nac');
	
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'fecha_nac',
				'language' => 'es',
				'htmlOptions' => array(
						'size' => '10',         // textField size
						'maxlength' => '10',    // textField maxlength
						'class'=>'span5'
				),
				'options' => array(
						'dateFormat' => 'yy-mm-dd',
						'changeYear' => 'true',
						'changeMonth' => 'true',
						'monthNames' => array('Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre'),
						'yearRange'=>'1950:'.date('Y'),
				),
		));
	?>

	<?php echo $form->textFieldRow($model,'peso',array('class'=>'span5', 'hint'=>'En Kg.')); ?>

	<?php echo $form->textFieldRow($model,'altura',array('class'=>'span5', 'hint'=>'En centimetros.')); ?>

	<?php echo $form->textFieldRow($model,'medidas',array('class'=>'span5','maxlength'=>12, 'hint'=>utf8_encode('Separadas por un guión. Ej: 90-60-90'))); ?>

	<?php echo $form->textFieldRow($model,'detalle_servicios',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'horario',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'tel_1',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'tel_2',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'valor_normal',array('class'=>'span5','maxlength'=>20)); ?>

	<?php /*echo $form->textFieldRow($model,'escort_eval_id',array('class'=>'span5'));*/
	//Colocar el enlace a la evaluación si se es Administrador
	?>

	<?php /*echo $form->textFieldRow($model,'estado',array('class'=>'span5'));*/
		if(Yii::app()->user->esAdmin())
			echo $form->dropDownListRow($model,'estado', array('1'=>'Habilitada', '0'=>'Deshabilitada'),array('class'=>'span5'));
	?>

	<?php echo $form->textAreaRow($model,'descripc',array('class'=>'span5','maxlength'=>500)); ?>



	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'htmlOptions'=>array('id'=>'btnEnviar'),
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); echo'</div>'; ?>
