<?php
$this->breadcrumbs=array(
	'Acc Types'=>array('index'),
	$model->AccTypeName.'s',
);

$this->tasksMenu[]=array('label'=>'Accounts home', 'icon'=>'home white', 'url'=>array('index'));
$this->tasksMenu[]='---';
$this->tasksMenu[]=array('label'=>'Add a new account type', 'icon'=>'pencil white', 'url'=>array('create'));
$this->tasksMenu[]=array('label'=>'Edit this account type', 'icon'=>'edit white', 'url'=>array('update','id'=>$model->Id));
$this->tasksMenu[]=array('label'=>'Delete this account type', 'icon'=>'trash white', 'url'=>array('delete','id'=>$model->Id));

?>

<h1>View AccType #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'AccTypeName',
	),
)); ?>

<div class="row-fluid row-transactions-grid">
	<h2>Transactions</h2>
	<?php
	$transactionsModel = Transaction::model();
	$this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'id' => 'transactions-grid',
		'dataProvider' => $transactionsModel->getAccountTypeTransactions($model->Id),
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
