<?php
$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Accounts', 'url'=>array('index')),
	array('label'=>'Create Accounts', 'url'=>array('create')),
	array('label'=>'View Accounts', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Accounts', 'url'=>array('admin')),
);
?>

<h1>Update Accounts <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>