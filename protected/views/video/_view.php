<?php
/* @var $this VideoController */
/* @var $data Video */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome_contato')); ?>:</b>
	<?php echo CHtml::encode($data->nome_contato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_contato')); ?>:</b>
	<?php echo CHtml::encode($data->email_contato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefone_contato')); ?>:</b>
	<?php echo CHtml::encode($data->telefone_contato); ?>
	<br />


</div>