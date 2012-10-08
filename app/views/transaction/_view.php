<div class="well">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AccountId')); ?>:</b>
	<?php echo CHtml::encode($data->AccountId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TransDate')); ?>:</b>
	<?php echo CHtml::encode($data->TransDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TransType')); ?>:</b>
	<?php echo CHtml::encode($data->TransType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PayeeId')); ?>:</b>
	<?php echo CHtml::encode($data->PayeeId); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('TransAmount')); ?>:</b>
	<?php echo CHtml::encode($data->TransAmount); ?>
	<br />


</div>