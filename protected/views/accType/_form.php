<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'acc-type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'AccTypeName'); ?>
		<?php echo $form->textField($model,'AccTypeName',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'AccTypeName'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->