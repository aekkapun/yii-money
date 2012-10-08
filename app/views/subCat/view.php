<?php
$this->breadcrumbs=array(
	'Sub Cats'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List subCat', 'url'=>array('index')),
	array('label'=>'Create subCat', 'url'=>array('create')),
	array('label'=>'Update subCat', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete subCat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage subCat', 'url'=>array('admin')),
);
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
