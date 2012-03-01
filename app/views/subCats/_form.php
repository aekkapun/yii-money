<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sub-cats-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'CatType'); ?>
		<?php echo $form->dropDownList($model,'CatType',array('Expense'=>'Expense','Income'=>'Income')); ?>
		<?php echo $form->error($model,'CatType'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'CatId'); ?>
		<?php echo $form->dropDownList($model,'CatId', CHtml::listData(Cats::model()->findAll(), 'Id', 'CategoryName')); ?>
		<?php echo $form->error($model,'CatId'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'SubCatName'); ?>
		<?php echo $form->textField($model,'SubCatName',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'SubCatName'); ?>
	</div>

	<div class="control-group wide">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->