<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CatId')); ?>:</b>
	<?php echo Cats::model()->findbyPk($data->CatId)->CategoryName; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SubCatName')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SubCatName), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CatType')); ?>:</b>
	<?php echo CHtml::encode($data->CatType); ?>
	<br />

</div>