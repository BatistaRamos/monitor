<?php
/* @var $this VideoController */
/* @var $model Video */

$this->breadcrumbs=array(
	'Videos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Video', 'url'=>array('index')),
	array('label'=>'Criar monitoria de Video', 'url'=>array('create')),
	array('label'=>'Update monitoria de Video', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Deletar monitoria de Video', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Você tem certeza que quer efetuar esta remoção?')),
	array('label'=>'Gerenciar Video', 'url'=>array('admin')),
);
?>

<h1>View Video #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'descricao',
		'url',
		'nome_contato',
		'email_contato',
		'telefone_contato',
	),
)); ?>
