<?php
$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	$model->AccName,
);
$this->menu=array(
	array('label'=>'List Accounts', 'url'=>array('index')),
	array('label'=>'Create Accounts', 'url'=>array('create')),
	array('label'=>'Update Accounts', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Accounts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Accounts', 'url'=>array('admin')),
);
?>

<h1>Account Details: <?php echo $model->AccName; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
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
<div class="row-fluid row-transactions-grid">
	<h2>Transactions</h2>
	<?php
	$transactionsModel = Transaction::model();
	$this->widget('zii.widgets.grid.CGridView', array(
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
				'value' => '$data->relPayee->PayeeName'
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
				'class' => 'CButtonColumn',
				'deleteButtonImageUrl' => Yii::app()->baseUrl.'/images/form-reset.png',
				'updateButtonImageUrl' => Yii::app()->baseUrl.'/images/form-edit.png',
				'viewButtonImageUrl' => Yii::app()->baseUrl.'/images/form-submit.png',
			),
		),
	));
	?>
</div>