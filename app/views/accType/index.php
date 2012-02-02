<?php
$this->breadcrumbs=array(
	'Acc Types',
);

$this->menu=array(
	array('label'=>'Create AccType', 'url'=>array('create')),
	array('label'=>'Manage AccType', 'url'=>array('admin')),
);
?>

<h1>Acc Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
