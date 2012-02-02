<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'accounts-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'AccName'); ?>
		<?php echo $form->textField($model,'AccName',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'AccName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AccTypeId'); ?>
		<?php echo $form->textField($model,'AccTypeId'); ?>
		<?php echo $form->error($model,'AccTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'OverDraftLimit'); ?>
		<?php echo $form->textField($model,'OverDraftLimit'); ?>
		<?php echo $form->error($model,'OverDraftLimit'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->