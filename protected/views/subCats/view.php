<?php
$this->breadcrumbs=array(
	'Sub Cats'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List SubCats', 'url'=>array('index')),
	array('label'=>'Create SubCats', 'url'=>array('create')),
	array('label'=>'Update SubCats', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete SubCats', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SubCats', 'url'=>array('admin')),
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
