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
<div class="row-fluid">
	<h1>Create Account Types</h1>
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>	
</div>