<?php
$this->breadcrumbs=array(
	'Account Types'=>array('index'),
	$model->AccTypeName.'s',
);

$this->tasksMenu[]=array('label'=>'Account Types Home', 'icon'=>'home', 'url'=>array('index'));
$this->tasksMenu[]='---';
$this->tasksMenu[]=array('label'=>'Add New Account type', 'icon'=>'pencil', 'url'=>array('create'));
$this->tasksMenu[]=array('label'=>'Edit this account type', 'icon'=>'edit', 'url'=>array('update','id'=>$model->Id));


//$this->menu=$model->getAccountTypeMenuItems();

?>

<h1><?php echo $model->AccTypeName.'s';?></h1>

<div class="row-fluid">
<!--
	<div class="span5">-->
		<?php
			$accountModel = Account::model();

			$this->widget('zii.widgets.CListView', array(
				'dataProvider' => $accountModel->getAccounts($model->Id),
				'itemView'=> '//account/_view'
			));
		?>		
<!--					
	</div>
	<div class="span7">
	
	</div>-->
</div>

<div class="row-fluid row-transactions-grid">
	<h2>Transactions: All <?php echo $model->AccTypeName.'s';?></h2>
	<?php
	$transactionsModel = Transaction::model();
	$this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'id' => 'account-type-transactions-grid',
		'dataProvider' => $transactionsModel->getAccountTypeTransactions($model->Id),
		'filter' => $transactionsModel,
		'columns' => array(
			array(
				'name' => 'TransDate',
				'value' => 'date("M j, Y", $data->transDateInt)',
			),
			array(
				'name' => 'AccountId',
				'type' => 'raw',
				'value' => 'EMoney::accountLink($data->relAccount)'
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
