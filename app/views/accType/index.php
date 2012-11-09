<?php
// Set breadcrumbs
$this->breadcrumbs = array(
	'Account Types'
);

// Add available tasks / actions
$this->tasksMenu=array('create');

// Set view haeading
$this->viewHeading = 'Account Types';

?>

<div class="row-fluid">
	<?php
	$this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'id' => 'acc-type-grid',
		'dataProvider' => $model->search(),
		'filter' => $model,
		'columns' => array(
			'AccTypeName',
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'htmlOptions'=>array('style'=>'width: 50px'),
			),
		),
	));
	?>	
</div>