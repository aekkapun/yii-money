<?php
$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	$model->AccName,
);

$this->menu=array(
//	array('label'=>'List Accounts', 'url'=>array('index')),
);

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

<div class="row-fluid">
	<div class="action-buttons">
		<?php echo CHtml::Link('Delete Account',array('delete','id'=>$model->Id),array('class'=>'btn btn-danger')); ?>
		<?php echo CHtml::Link('Update Account',array('update','id'=>$model->Id),array('class'=>'btn btn-warning')); ?>
		<?php echo CHtml::Link('Add New Account',array('create'),array('class'=>'btn btn-success')); ?>	
	</div>
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
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'htmlOptions'=>array('style'=>'width: 50px'),
			),
		),
	));
	?>
</div>