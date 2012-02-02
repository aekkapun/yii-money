<?php
$this->breadcrumbs=array(
	'Transactions'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Transactions', 'url'=>array('index')),
	array('label'=>'Create Transactions', 'url'=>array('create')),
	array('label'=>'View Transactions', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Transactions', 'url'=>array('admin')),
);
?>

<h1>Update Transactions <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>