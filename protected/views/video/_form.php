<?php
/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'video-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model,'descricao',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nome_contato'); ?>
		<?php echo $form->textField($model,'nome_contato',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'nome_contato'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_contato'); ?>
		<?php echo $form->textField($model,'email_contato',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email_contato'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefone_contato'); ?>
		<?php echo $form->textField($model,'telefone_contato',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'telefone_contato'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->