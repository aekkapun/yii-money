<?php
// Set breadcrumbs
$this->breadcrumbs=array(
	'Payees'=>array('index'),
	$model->PayeeName,
);

// Add available tasks / actions
$this->tasksMenu=array('create','update','delete');

// Set view haeading
$this->viewHeading = $model->PayeeName;
?>

<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon"><i class="icon icon-barcode"></i></span>
				<h5>Transactions for <?php echo $model->PayeeName;?></h5>
			</div>
			<div class="widget-content">
				<?php
				$transactionsModel = Transaction::model();
				$this->widget('bootstrap.widgets.TbGridView', array(
					'type'=>'striped bordered condensed',
					'id' => 'transactions-grid',
					'pagerCssClass' =>'pagination alternate',
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
							'value' => 'EMoney::formatAmount($data->TransAmount)',
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
