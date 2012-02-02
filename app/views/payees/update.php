<?php
$this->breadcrumbs=array(
	'Payees'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Payees', 'url'=>array('index')),
	array('label'=>'Create Payees', 'url'=>array('create')),
	array('label'=>'View Payees', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Payees', 'url'=>array('admin')),
);
?>

<h1>Update Payees <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>