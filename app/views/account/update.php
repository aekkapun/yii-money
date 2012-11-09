<?php
$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

// Add available tasks / actions
$this->tasksMenu=array('create','delete');
?>

<h1>Update Accounts <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>