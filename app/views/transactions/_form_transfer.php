<div class="form">

<?php $formTransfer=$this->beginWidget('CActiveForm', array(
	'id'=>'transactions-form-transfer',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $formTransfer->errorSummary($model,'TransDate'); ?>

	<div class="control-group">
		<?php echo $formTransfer->labelEx($model, 'TransDate'); ?>
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
		<?php echo $formTransfer->error($model,'TransDate'); ?>
		
	</div>
	
	<div class="control-group">
		<?php echo $formTransfer->labelEx($model,'AccountId'); ?>
		<?php echo $formTransfer->dropDownList($model,'AccountId', CHtml::listData(Accounts::model()->findAll(), 'Id', 'AccName')); ?>
		<?php echo $formTransfer->error($model,'AccountId'); ?>
	</div>

	<div class="control-group">
		<?php echo $formTransfer->hiddenField('TransType','Transfer'); ?>
	</div>

	<div class="control-group">
		<?php echo $formTransfer->labelEx($model,'PayeeId'); ?>
		<?php echo $formTransfer->dropDownList($model,'PayeeId', CHtml::listData(Payees::model()->findAll(), 'Id', 'PayeeName')); ?>
		<?php echo $formTransfer->error($model,'PayeeId'); ?>
	</div>

	<div class="control-group">
		<?php echo $formTransfer->labelEx($model,'SubCatId'); ?>
		<?php echo $formTransfer->dropDownList($model,'SubCatId', CHtml::listData(SubCats::model()->findAll(), 'Id', 'SubCatName')); ?>
		<?php echo $formTransfer->error($model,'SubCatId'); ?>
	</div>
	
	<div class="control-group">
		<?php echo $formTransfer->labelEx($model,'TransAmount'); ?>
		<?php echo $formTransfer->textField($model,'TransAmount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $formTransfer->error($model,'TransAmount'); ?>
	</div>

	<div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
