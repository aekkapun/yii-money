<?php
$this->breadcrumbs = array(
	'Transactions' => array('index'),
	'Manage',
);

$this->menu = array(
	array('label' => 'List Transactions', 'url' => array('index')),
	array('label' => 'Create Transactions', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('transactions-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="well">
	<h1>Manage Transactions</h1>
	<p>
		You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
		or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
	</p>

	<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
	<div class="search-form" style="display:none">
		<?php
		$this->renderPartial('_search', array(
			'model' => $model,
		));
		?>
	</div><!-- search-form -->
</div>
<div class="row-fluid">
	<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'transactions-grid',
		'dataProvider' => $model->search(),
		'filter' => $model,
		'columns' => array(
			array(
				'name' => 'AccountId',
				'value' => '$data->accounts->AccName'
			), array(
				'name' => 'TransDate',
				'value'=>'date("M j, Y", $data->transDateInt)',
			),
			'TransType',
			array(
				'name' => 'PayeeId',
				'value' => '$data->payees->PayeeName'
			),
			array(
				'name' => 'CatId',
				'value' => '$data->cats->CategoryName'
			),
			array(
				'name' => 'SubCatId',
				'value' => '$data->subCats->SubCatName'
			),
			'TransAmount',
			array(
				'class' => 'CButtonColumn',
			),
		),
	));
	?>
</div>
