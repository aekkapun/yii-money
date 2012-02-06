<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transactions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'TransDate'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'=>$model,
			'attribute' => 'TransDate',
			'options' => array(
				'showAnim' => 'fold',
				'dateFormat' => 'yy-mm-dd',
			),
			'htmlOptions' => array(
				'style' => 'height:20px;'
			),
		));
		?>
		<?php echo $form->error($model,'TransDate'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'AccountId'); ?>
		<?php echo $form->dropDownList($model,'AccountId', CHtml::listData(Accounts::model()->findAll(), 'Id', 'AccName')); ?>
		<?php echo $form->error($model,'AccountId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TransType'); ?>
		<?php echo $form->dropDownList($model,'TransType',array('Withdrawal'=>'Withdrawal','Deposit'=>'Deposit','Transfer'=>'Transfer')); ?>
		<?php echo $form->error($model,'TransType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PayeeId'); ?>
		<?php echo $form->dropDownList($model,'PayeeId', CHtml::listData(Payees::model()->findAll(), 'Id', 'PayeeName')); ?>
		<?php echo $form->error($model,'PayeeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CatId'); ?>
		<?php echo $form->dropDownList($model,'CatId', CHtml::listData(Cats::model()->findAll(), 'Id', 'CategoryName')); ?>
		<?php echo $form->error($model,'CatId'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'SubCatId'); ?>
		<?php echo $form->dropDownList($model,'SubCatId', CHtml::listData(SubCats::model()->findAll(), 'Id', 'SubCatName')); ?>
		<?php echo $form->error($model,'SubCatId'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
