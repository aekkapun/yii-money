<?php
$this->breadcrumbs=array(
	'Acc Types'=>array('index'),
	$model->AccTypeName.'s',
);

$this->tasksMenu[]=array('label'=>'Accounts home', 'icon'=>'home', 'url'=>array('index'));
$this->tasksMenu[]='---';
$this->tasksMenu[]=array('label'=>'Add a new account type', 'icon'=>'pencil', 'url'=>array('create'));
$this->tasksMenu[]=array('label'=>'Edit this account type', 'icon'=>'edit', 'url'=>array('update','id'=>$model->Id));
$this->tasksMenu[]=array('label'=>'Delete this account type', 'icon'=>'trash', 'url'=>array('delete','id'=>$model->Id));

?>

<h1>View AccType #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'AccTypeName',
	),
)); ?>
