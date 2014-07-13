<?php
$this->breadcrumbs=array(
	'Escort Tags'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EscortTag','url'=>array('index')),
	array('label'=>'Manage EscortTag','url'=>array('admin')),
);
?>

<h1>Create EscortTag</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>