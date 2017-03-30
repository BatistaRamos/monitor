<?php
/* @var $this VideoController */
/* @var $model Video */

$this->breadcrumbs=array(
	'Videos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista Video', 'url'=>array('index')),
	array('label'=>'Gerencia Video', 'url'=>array('admin')),
);
?>

<h1>Cria monitoria Video</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
