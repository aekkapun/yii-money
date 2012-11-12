<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-pencil"></i>									
				</span>
				<h5>Enter New Account details</h5>
			</div>
			<div class="widget-content nopadding">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'accounts-form',
					'htmlOptions'=> array('class'=>'form-horizontal'),
					'enableAjaxValidation'=>false,
				));?>
				<div class="control-group">
					<?php echo $form->labelEx($model,'AccTypeId', array('class'=>'control-label')); ?>
					<div class="controls">
						<?php echo $form->dropDownList($model,'AccTypeId', CHtml::listData(AccType::model()->findAll(), 'Id', 'AccTypeName')); ?>
						<?php echo $form->error($model,'AccTypeId', array('class'=>'help-inline')); ?>
					</div>
				</div>
				<div class="control-group">
					<?php echo $form->labelEx($model,'AccName', array('class'=>'control-label')); ?>
					<div class="controls">
						<?php echo $form->textField($model,'AccName',array('size'=>50,'maxlength'=>50)); ?>
						<?php echo $form->error($model,'AccName', array('class'=>'help-inline')); ?>
					</div>
				</div>
				<div class="control-group">
					<?php echo $form->labelEx($model,'OverDraftLimit', array('class'=>'control-label')); ?>
					<div class="controls">
						<?php echo $form->textField($model,'OverDraftLimit'); ?>
						<?php echo $form->error($model,'OverDraftLimit', array('class'=>'help-inline')); ?>
					</div>
				</div>
				<div class="form-actions">
					<?php echo CHtml::submitButton($model->isNewRecord ? 'Add New Account' : 'Save', array('class' => 'btn btn-primary')); ?>
				</div>
				<?php $this->endWidget(); ?>
			</div>
		</div>			
	</div>
</div>



