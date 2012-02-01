<?php
$this->breadcrumbs=array(
	'Cats'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cats', 'url'=>array('index')),
	array('label'=>'Create Cats', 'url'=>array('create')),
	array('label'=>'View Cats', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Cats', 'url'=>array('admin')),
);
?>

<h1>Update Cats <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>