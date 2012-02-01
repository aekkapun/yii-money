<?php
$this->breadcrumbs=array(
	'Acc Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AccType', 'url'=>array('index')),
	array('label'=>'Manage AccType', 'url'=>array('admin')),
);
?>

<h1>Create AccType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>