<div class="form">

<?php $formDeposit=$this->beginWidget('CActiveForm', array(
	'id'=>'transactions-form-deposit',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $formDeposit->errorSummary($model,'TransDate'); ?>

	<div class="control-group">
		<?php echo $formDeposit->labelEx($model, 'TransDate'); ?>
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
		<?php echo $formDeposit->error($model,'TransDate'); ?>
		
	</div>
	
	<div class="control-group">
		<?php echo $formDeposit->labelEx($model,'AccountId'); ?>
		<?php echo $formDeposit->dropDownList($model,'AccountId', CHtml::listData(Accounts::model()->findAll(), 'Id', 'AccName')); ?>
		<?php echo $formDeposit->error($model,'AccountId'); ?>
	</div>

	<div class="control-group">
		<?php echo $formDeposit->hiddenField('TransType','Deposit'); ?>
	</div>

	<div class="control-group">
		<?php echo $formDeposit->labelEx($model,'PayeeId'); ?>
		<?php echo $formDeposit->dropDownList($model,'PayeeId', CHtml::listData(Payees::model()->findAll(), 'Id', 'PayeeName')); ?>
		<?php echo $formDeposit->error($model,'PayeeId'); ?>
	</div>

	<div class="control-group">
		<?php echo $formDeposit->labelEx($model,'SubCatId'); ?>
		<?php echo $formDeposit->dropDownList($model,'SubCatId', CHtml::listData(SubCats::model()->findAll(), 'Id', 'SubCatName')); ?>
		<?php echo $formDeposit->error($model,'SubCatId'); ?>
	</div>
	
	<div class="control-group">
		<?php echo $formDeposit->labelEx($model,'TransAmount'); ?>
		<?php echo $formDeposit->textField($model,'TransAmount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $formDeposit->error($model,'TransAmount'); ?>
	</div>

	<div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
