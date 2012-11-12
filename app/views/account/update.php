<?php
$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	'Edit'
);

// Set view haeading
$this->viewHeading = 'Edit '.$model->AccName;
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>