<?php
$this->breadcrumbs=array(
	'Payees'=>array('index'),
	$model->PayeeName,
);

$this->menu=array(
	array('label'=>'List Payees', 'url'=>array('index')),
	array('label'=>'Create Payees', 'url'=>array('create')),
	array('label'=>'Update Payees', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Payees', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Payees', 'url'=>array('admin')),
);
?>

<h1>Payee: <?php echo $model->PayeeName; ?></h1>

<div class="row-fluid row-transactions-grid">
	<h2>Transactions</h2>
	<?php
	$transactionsModel = Transaction::model();
	$this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'id' => 'transactions-grid',
		'dataProvider' => $transactionsModel->getAccountTransactions('PayeeId',$model->Id,'TransDate DESC'),
		'filter' => $transactionsModel,
		'columns' => array(
			array(
				'name' => 'TransDate',
				'value' => 'date("M j, Y", $data->transDateInt)',
			),
			'TransType',
			array(
				'name' => 'AccountId',
				'type' => 'raw',
				'value' => 'CHtml::link($data->relAccount->AccName,"/account/view/id/$data->AccountId")'
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
			),
		),
	));
	?>
</div>
