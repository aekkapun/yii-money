<?php
$this->breadcrumbs=array(
	'Payees'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Payees', 'url'=>array('index')),
	array('label'=>'Create Payees', 'url'=>array('create')),
	array('label'=>'Update Payees', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Payees', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Payees', 'url'=>array('admin')),
);
?>

<h1>View Payees #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'PayeeName',
	),
)); ?>
