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
		$('.search-form').slideToggle();
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

<div class="row-fluid">
	<h1>Manage Transactions</h1>
	<div class="row-fluid">
		<div class="action-buttons">
			<?php echo CHtml::Link('Create a new Transaction',array('create'),array('class'=>'btn btn-success')); ?>
			<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn btn-primary btn-info')); ?>
		</div>
	</div>
</div>

<div class="row-fluid">
		<div class="search-form" style="display:none">
		<?php
		$this->renderPartial('_search', array(
			'model' => $model,
		));
		?>
	</div><!-- search-form -->	
</div>

<div class="row-fluid">
	<h2>All Transactions</h2>
	<?php
	$this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'id' => 'transactions-grid',
		'dataProvider' => $model->search(),
		'filter' => $model,
		'columns' => array(
			array(
				'name' => 'AccountId',
				'value' => '$data->relAccount->AccName'
			), array(
				'name' => 'TransDate',
				'value' => 'date("M j, Y", $data->transDateInt)',
			),
			'TransType',
			array(
				'name' => 'PayeeId',
				'value' => '$data->relPayee->PayeeName',
			),
			array(
				'name' => 'SubCatId',
				'value' => '$data->relSubCat->getCatName($data->SubCatId).$data->relSubCat->SubCatName',
			),
			array(
				'name' => 'TransAmount',
				'value' => 'Yii::app()->numberFormatter->formatCurrency($data->TransAmount,Yii::app()->params->currency)',
			),
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'htmlOptions'=>array('style'=>'width: 50px'),
			)
		)
	));
	?>
</div>

