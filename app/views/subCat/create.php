<?php
$this->breadcrumbs=array(
	'Sub Cats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List subCat', 'url'=>array('index')),
	array('label'=>'Manage subCat', 'url'=>array('admin')),
);
?>
<div class="row-fluid">
	<h1>Create Sub Categories</h1>
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>


