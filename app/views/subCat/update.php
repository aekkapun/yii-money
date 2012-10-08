<?php
$this->breadcrumbs=array(
	'Sub Cats'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sub Categories', 'url'=>array('index')),
	array('label'=>'Create Sub Categories', 'url'=>array('create')),
	array('label'=>'View Sub Categories', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Sub Categories', 'url'=>array('admin')),
);
?>

<h1>Update Sub Categories <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>