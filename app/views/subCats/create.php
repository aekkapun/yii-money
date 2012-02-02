<?php
$this->breadcrumbs=array(
	'Sub Cats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubCats', 'url'=>array('index')),
	array('label'=>'Manage SubCats', 'url'=>array('admin')),
);
?>

<h1>Create Sub Categories</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>