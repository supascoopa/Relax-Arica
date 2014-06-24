<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/hover.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>
<?php $this->widget('bootstrap.widgets.TbNavbar',array(
	'type'=>'inverse',
	'brand' => '<img src ="' . Yii::app()->request->baseUrl . '/images/logo.png" />',
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Inicio', 'url'=>array('/site/index')),
            	/* Menús de Escort*/
            	array('label'=>'Cuenta', 'url'=>array('/usuario/'.Yii::app()->user->id),'visible'=>Yii::app()->user->esEscort()),
            	array('label'=>'Perfil Escort', 'url'=>array('/escort/'.Yii::app()->user->id),'visible'=>Yii::app()->user->esEscort()),
				/* Menús de Administrador */
            	array('label'=>'Usuarios', 'url'=>array('/usuario/index'),'visible'=>Yii::app()->user->esAdmin()),
            	array('label'=>'Escorts', 'url'=>array('/escort/index'),'visible'=>Yii::app()->user->esAdmin()),
            	array('label'=>'Partners', 'url'=>array('/partner/index'),'visible'=>Yii::app()->user->esAdmin()),
                array('label'=>utf8_encode('Iniciar Sesión'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>utf8_encode('Cerrar Sesión'). '('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),

        ),
    ),
)); ?>

	<div class="container" id="page">
	
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
		<?php endif?>
	
		<?php echo $content; ?>
		<div class="clear"></div> 
	<hr class="container">		
	</div><!-- page -->	
<div class="clear" style="height:20px;"></div>
	<div class="footer container" style="text-align:center">
		<div class="row">
				<div class="span3"><h4>Partners</h4>
				<ul class="partners">
					<?php $Partners = Partner::model()->findAll();
					if($Partners !=null){
						foreach($Partners as $Partner){
							echo '<li>';
							echo'<a href="'.$Partner->URL.'">'.$Partner->nombre;
							echo'</a>';
							echo '</li>';
						}
					}
					?>
				</ul>
				</div>
				
			</div> 
		<div>Copyright &copy; <?php echo date('Y'); ?> <?php echo utf8_encode('Relax Arica'); ?><br/></div>
	</div><!-- footer -->
</body>
</html>
