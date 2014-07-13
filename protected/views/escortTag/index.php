<?php
$this->breadcrumbs=array(
	'Escort Tags',
);

$this->menu=array(
	array('label'=>'Create EscortTag','url'=>array('create')),
	array('label'=>'Manage EscortTag','url'=>array('admin')),
);
?>

<h1>Escort Tags</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
