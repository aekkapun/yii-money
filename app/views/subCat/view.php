<?php
$this->breadcrumbs=array(
	'Sub Cats'=>array('index'),
	$model->Id,
);

// Add available tasks / actions
$this->tasksMenu=array('create','update','delete');
?>

<h1><?php echo $model->SubCatName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'CatId',
		'SubCatName',
		'CatType',
	),
)); ?>
