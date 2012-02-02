<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AccountName')); ?>:</b>
	<?php echo CHtml::encode($data->AccountName); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('CatId')); ?>:</b>
	<?php echo CHtml::encode($data->CatId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TransAmount')); ?>:</b>
	<?php echo CHtml::encode($data->TransAmount); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('TransId')); ?>:</b>
	<?php echo CHtml::encode($data->TransId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SubCatId')); ?>:</b>
	<?php echo CHtml::encode($data->SubCatId); ?>
	<br />

	*/ ?>

</div>