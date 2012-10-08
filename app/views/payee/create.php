<?php
$this->breadcrumbs=array(
	'Payees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Payees', 'url'=>array('index')),
	array('label'=>'Manage Payees', 'url'=>array('admin')),
);
?>

<div class="row-fluid">
	<h1>Create Payees</h1>
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
