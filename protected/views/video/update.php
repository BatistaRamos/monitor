<?php
/* @var $this VideoController */
/* @var $model Video */

$this->breadcrumbs=array(
	'Videos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista monitoria de Video', 'url'=>array('index')),
	array('label'=>'Cria monitoria de Video', 'url'=>array('create')),
	array('label'=>'Ver  Video', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerencia Video', 'url'=>array('admin')),
);
?>

<h1>Update Video <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
