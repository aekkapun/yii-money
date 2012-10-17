<?php
$this->breadcrumbs=array(
	'Accounts'=>array('index'),
);

$this->tasksMenu[]=array('label'=>'Accounts home', 'icon'=>'home', 'url'=>array('admin'));
$this->tasksMenu[]='---';
$this->tasksMenu[]=array('label'=>'Add a new account', 'icon'=>'pencil', 'url'=>array('create'));

?>

<h1>Accounts</h1>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
