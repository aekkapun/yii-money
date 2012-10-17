<?php
$this->tasksMenu[]=array('label'=>'Accounts home', 'icon'=>'home', 'url'=>array('/account/admin'));
$this->tasksMenu[]='---';
$this->tasksMenu[]=array('label'=>'Add a new transaction', 'icon'=>'pencil', 'url'=>array('create'));

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
				'type' => 'raw',
				'value' => 'CHtml::link($data->relAccount->AccName,"/account/view/id/$data->AccountId")'
			), array(
				'name' => 'TransDate',
				'value' => 'date("M j, Y", $data->transDateInt)',
			),
			'TransType',
			array(
				'name' => 'PayeeId',
				'type' => 'raw',
				'value' => 'CHtml::link($data->relPayee->PayeeName,"/payee/view/id/$data->SubCatId")'
			),
			array(
				'name' => 'SubCatId',
				'type' => 'raw',
				'value' => 'CHtml::link($data->relSubCat->getCatName($data->SubCatId).$data->relSubCat->SubCatName,"/subcat/view/id/$data->SubCatId")'
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


