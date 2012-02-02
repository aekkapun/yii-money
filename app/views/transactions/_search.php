<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AccountName'); ?>
		<?php echo $form->textField($model,'AccountName',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TransDate'); ?>
		<?php echo $form->textField($model,'TransDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TransType'); ?>
		<?php echo $form->textField($model,'TransType',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PayeeId'); ?>
		<?php echo $form->textField($model,'PayeeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CatId'); ?>
		<?php echo $form->textField($model,'CatId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TransAmount'); ?>
		<?php echo $form->textField($model,'TransAmount',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TransId'); ?>
		<?php echo $form->textField($model,'TransId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SubCatId'); ?>
		<?php echo $form->textField($model,'SubCatId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->