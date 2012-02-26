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
		<?php echo $form->label($model,'CategoryName'); ?>
		<?php echo $form->textField($model,'CategoryName',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'CatType'); ?>
		<?php echo $form->textField($model,'CatType',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="control-group buttons">
		<?php echo CHtml::submitButton('Search', array('class' => 'search-button btn btn-primary btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->