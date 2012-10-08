<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="control-group">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'AccName'); ?>
		<?php echo $form->textField($model,'AccName',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'AccTypeId'); ?>
		<?php echo $form->textField($model,'AccTypeId'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'OverDraftLimit'); ?>
		<?php echo $form->textField($model,'OverDraftLimit'); ?>
	</div>

	<div class="control-group buttons">
		<?php echo CHtml::submitButton('Search', array('class' => 'search-button btn btn-primary btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->