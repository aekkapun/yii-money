<?php
$this->breadcrumbs=array(
	'Acc Types'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AccType', 'url'=>array('index')),
	array('label'=>'Create AccType', 'url'=>array('create')),
	array('label'=>'View AccType', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage AccType', 'url'=>array('admin')),
);
?>

<h1>Update AccType <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>