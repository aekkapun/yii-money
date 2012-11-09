<?php
$this->breadcrumbs=array(
	'Cats'=>array('index'),
	$model->Id,
);

// Add available tasks / actions
$this->tasksMenu=array('create');
?>

<h1>View Cats #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'CategoryName',
		'CatType',
	),
)); ?>
