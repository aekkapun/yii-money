<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CategoryName')); ?>:</b>
	<?php echo CHtml::encode($data->CategoryName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CatType')); ?>:</b>
	<?php echo CHtml::encode($data->CatType); ?>
	<br />


</div>