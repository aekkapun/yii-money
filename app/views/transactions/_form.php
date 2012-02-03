<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transactions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'AccountName'); ?>
		<?php echo $form->textField($model,'AccountName',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'AccountName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'TransDate'); ?>
		<?php
		// TODO - set correct date format and test datepicker
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name' => 'TransDate',
			// additional javascript options for the date picker plugin
			'options' => array(
				'showAnim' => 'fold',
			),
			'htmlOptions' => array(
				'style' => 'height:20px;'
			),
		));
		?>
		<?php// echo $form->textField($model,'TransDate'); ?>
		<?php echo $form->error($model,'TransDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TransType'); ?>
		<?php echo $form->textField($model,'TransType',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'TransType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PayeeId'); ?>
		<?php echo $form->textField($model,'PayeeId'); ?>
		<?php echo $form->error($model,'PayeeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CatId'); ?>
		<?php echo $form->textField($model,'CatId'); ?>
		<?php echo $form->error($model,'CatId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TransAmount'); ?>
		<?php echo $form->textField($model,'TransAmount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'TransAmount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TransId'); ?>
		<?php echo $form->textField($model,'TransId'); ?>
		<?php echo $form->error($model,'TransId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SubCatId'); ?>
		<?php echo $form->textField($model,'SubCatId'); ?>
		<?php echo $form->error($model,'SubCatId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->