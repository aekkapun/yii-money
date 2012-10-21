<?php
$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	$model->AccName,
);

$this->tasksMenu[]=array('label'=>'Accounts home', 'icon'=>'home', 'url'=>array('index'));
$this->tasksMenu[]='---';
$this->tasksMenu[]=array('label'=>'Add new account', 'icon'=>'pencil', 'url'=>array('create'));
$this->tasksMenu[]=array('label'=>'Edit this account', 'icon'=>'edit', 'url'=>array('update','id'=>$model->Id));

?>



<div class="row-fluid">
	<h1>Account Details: <?php echo $model->AccName; ?></h1>

	<?php
	$this->widget('bootstrap.widgets.TbDetailView', array(
		'type'=>'striped bordered condensed',
		'data' => $model,
		'attributes' => array(
			'AccName',
			array
				(
				'name' => 'AccTypeId',
				'value' => $model->relAccType->AccTypeName,
			),
			array
				(
				'name' => 'OverDraftLimit',
				'value' => '-'.$model->OverDraftLimit,
			),
		),
	));
	?>
</div>


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
				'name' => 'PayeeId',
				'type' => 'raw',
				'value' => 'EMoney::payeeLink($data->relPayee)',
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