<?php
$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Accounts', 'url'=>array('index')),
	array('label'=>'Create Accounts', 'url'=>array('create')),
	array('label'=>'Update Accounts', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Accounts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Accounts', 'url'=>array('admin')),
);
?>

<h1>View Accounts #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'AccName',
		'AccTypeId',
		'OverDraftLimit',
	),
)); ?>
