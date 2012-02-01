<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payees-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'PayeeName'); ?>
		<?php echo $form->textField($model,'PayeeName',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'PayeeName'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->