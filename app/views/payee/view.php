<?php
$this->breadcrumbs=array(
	'Payees'=>array('index'),
	$model->PayeeName,
);

$this->tasksMenu[]=array('label'=>'Payees Home', 'icon'=>'home', 'url'=>array('index'));
$this->tasksMenu[]='---';
$this->tasksMenu[]=array('label'=>'Add new payee', 'icon'=>'pencil', 'url'=>array('create'));
$this->tasksMenu[]=array('label'=>'Edit this payee', 'icon'=>'edit', 'url'=>array('update','id'=>$model->Id));
?>

<h1>Payee: <?php echo $model->PayeeName; ?></h1>

<div class="row-fluid row-transactions-grid">
	<h2>Transactions</h2>
	<?php
	$transactionsModel = Transaction::model();
	$this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'id' => 'transactions-grid',
		'dataProvider' => $transactionsModel->getAccountTransactions($model->Id),
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
				'value' => 'EMoney::accountLink($data->relAccount)'
			),
			array(
				'name' => 'SubCatId',
				'type' => 'raw',
				'value' => 'EMoney::subCatLink($data->relSubCat)',
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
