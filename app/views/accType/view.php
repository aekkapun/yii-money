<?php
$this->breadcrumbs=array(
	'Accounts'=>array('/'),
	$model->AccTypeName.'s',
);

$this->tasksMenu[]=array('label'=>'Add New Account type', 'icon'=>'pencil', 'url'=>array('create'));
$this->tasksMenu[]=array('label'=>'Edit this account type', 'icon'=>'edit', 'url'=>array('update','id'=>$model->Id));


// Set view haeading
$this->viewHeading = $model->AccTypeName.'s';


?>

<div class="row-fluid">

	<div class="span6">
		<div class="widget-box">
			<div class="widget-title">
				<h5>Accounts</h5>
			</div>
			<div class="widget-content">
		<?php
			$accountModel = Account::model();

			$this->widget('zii.widgets.CListView', array(
				'dataProvider' => $accountModel->getAccounts($model->Id),
				'itemView'=> '//account/_view'
			));
		?>		
					
			</div>
		</div>
	</div>
	<div class="span6">
	
	</div>
</div>

<div class="row-fluid">
	<div class="span-12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon"><i class="icon icon-barcode"></i></span>
				<h5>Transactions: All <?php echo $model->AccTypeName.'s';?></h5>
			</div>
			<div class="widget-content">
				<?php
				$transactionsModel = Transaction::model();
				$this->widget('bootstrap.widgets.TbGridView', array(
					'type'=>'striped bordered condensed',
					'id' => 'account-type-transactions-grid',
					'pagerCssClass' =>'pagination alternate',
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
		</div>
	</div>
</div>
