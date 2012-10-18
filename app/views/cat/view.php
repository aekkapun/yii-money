<?php
$this->breadcrumbs=array(
	'Cats'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Cats', 'url'=>array('index')),
	array('label'=>'Create Cats', 'url'=>array('create')),
	array('label'=>'Update Cats', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Cats', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
);
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
