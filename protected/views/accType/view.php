<?php
$this->breadcrumbs=array(
	'Acc Types'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List AccType', 'url'=>array('index')),
	array('label'=>'Create AccType', 'url'=>array('create')),
	array('label'=>'Update AccType', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete AccType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AccType', 'url'=>array('admin')),
);
?>

<h1>View AccType #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'AccTypeName',
	),
)); ?>
