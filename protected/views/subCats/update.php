<?php
$this->breadcrumbs=array(
	'Sub Cats'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SubCats', 'url'=>array('index')),
	array('label'=>'Create SubCats', 'url'=>array('create')),
	array('label'=>'View SubCats', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage SubCats', 'url'=>array('admin')),
);
?>

<h1>Update SubCats <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>