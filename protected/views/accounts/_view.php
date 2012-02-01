<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AccName')); ?>:</b>
	<?php echo CHtml::encode($data->AccName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AccTypeId')); ?>:</b>
	<?php echo CHtml::encode($data->AccTypeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OverDraftLimit')); ?>:</b>
	<?php echo CHtml::encode($data->OverDraftLimit); ?>
	<br />


</div>