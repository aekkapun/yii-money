<?php
$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	'Add New',
);

// Set view haeading
$this->viewHeading = 'Add a New Account';
?>

<div class="row-fluid">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>


