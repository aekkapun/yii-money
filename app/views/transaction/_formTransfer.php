<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transactions-form-t',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model,'TransDate'); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model, 'TransDate'); ?>
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
				'id'=> 'date-t',
				'style' => 'height:20px;'
			),
		));
		?>
		<?php echo $form->error($model,'TransDate'); ?>
		
	</div>
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'AccountId'); ?>
		<?php echo $form->dropDownList($model,'AccountId', CHtml::listData(Account::model()->findAll(), 'Id', 'AccName')); ?>
		<?php echo $form->error($model,'AccountId'); ?>
	</div>
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'TransAmount'); ?>
		<?php echo $form->textField($model,'TransAmount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'TransAmount'); ?>
	</div>

	<div class="control-group wide">
		<?php echo $form->hiddenField($model,'TransType',array('value'=>'Transfer')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save Transfer' : 'Save', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
