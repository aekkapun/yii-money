<?php
$this->breadcrumbs=array(
	'Sub Cats',
);

$this->menu=array(
	array('label'=>'Create SubCats', 'url'=>array('create')),
	array('label'=>'Manage SubCats', 'url'=>array('admin')),
);
?>

<h1>Sub Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
