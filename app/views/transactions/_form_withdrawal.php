<div class="form">

<?php $formWithdrawal=$this->beginWidget('CActiveForm', array(
	'id'=>'transactions-form-withdrawal',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $formWithdrawal->errorSummary($model,'TransDate'); ?>

	<div class="control-group">
		<?php echo $formWithdrawal->labelEx($model, 'TransDate'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'=>$model,
			'themeUrl'=>Yii::app()->baseUrl.'/css/jui-themes',
			'theme'=>'cupertino',
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
		<?php echo $formWithdrawal->error($model,'TransDate'); ?>
		
	</div>
	
	<div class="control-group">
		<?php echo $formWithdrawal->labelEx($model,'AccountId'); ?>
		<?php echo $formWithdrawal->dropDownList($model,'AccountId', CHtml::listData(Accounts::model()->findAll(), 'Id', 'AccName')); ?>
		<?php echo $formWithdrawal->error($model,'AccountId'); ?>
	</div>

	<div class="control-group">
		<?php echo $formWithdrawal->hiddenField('TransType','Withdrawal'); ?>
	</div>

	<div class="control-group">
		<?php echo $formWithdrawal->labelEx($model,'PayeeId'); ?>
		<?php echo $formWithdrawal->dropDownList($model,'PayeeId', CHtml::listData(Payees::model()->findAll(), 'Id', 'PayeeName')); ?>
		<?php echo $formWithdrawal->error($model,'PayeeId'); ?>
	</div>

	<div class="control-group">
		<?php echo $formWithdrawal->labelEx($model,'SubCatId'); ?>
		<?php echo $formWithdrawal->dropDownList($model,'SubCatId', CHtml::listData(SubCats::model()->findAll(), 'Id', 'SubCatName')); ?>
		<?php echo $formWithdrawal->error($model,'SubCatId'); ?>
	</div>
	
	<div class="control-group">
		<?php echo $formWithdrawal->labelEx($model,'TransAmount'); ?>
		<?php echo $formWithdrawal->textField($model,'TransAmount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $formWithdrawal->error($model,'TransAmount'); ?>
	</div>

	<div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
