<?php
$this->breadcrumbs = array(
	'Transactions' => array('index'),
	'Create',
);

$this->menu = array(
	array('label' => 'List Transactions', 'url' => array('index')),
	array('label' => 'Manage Transactions', 'url' => array('admin')),
);
?>

<div class="row-fluid">
	<h1>Create Transactions</h1>
	<?php echo $this->renderPartial('_form', array('model' => $model)); ?>	
</div>
