<?php
$this->breadcrumbs=array(
	'Sub Cats'=>array('index'),
	$model->Id,
);

$this->tasksMenu[]=array('label'=>'Category Home', 'icon'=>'home', 'url'=>array('index'));
$this->tasksMenu[]='---';
$this->tasksMenu[]=array('label'=>'Add new category', 'icon'=>'pencil', 'url'=>array('create'));
$this->tasksMenu[]=array('label'=>'Edit this category', 'icon'=>'edit', 'url'=>array('update','id'=>$model->Id));
?>

<h1><?php echo $model->SubCatName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'CatId',
		'SubCatName',
		'CatType',
	),
)); ?>
