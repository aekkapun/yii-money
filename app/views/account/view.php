<?php
// Set breadcrumbs
$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	$model->AccName,
);

// Add available tasks / actions
$this->tasksMenu[]=array('label'=>'Add new account', 'icon'=>'pencil', 'url'=>array('create'));
$this->tasksMenu[]=array('label'=>'Edit this account', 'icon'=>'edit', 'url'=>array('update','id'=>$model->Id));

// Set view haeading
$this->viewHeading = $model->AccName;

?>
<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-content">
				<div class="row-fluid">
				<div class="span4">
						<div class="widget-content">
							<h5>Account type: <?php echo $model->relAccType->AccTypeName;?></h5>
							<h5>Limit: <?php echo '-'.EMoney::formatAmount($model->OverDraftLimit);?>
						</div>
				</div>
				<div class="span8">
					<div class="well">
						<div id="container" style="min-width: 400px; height: 200px; margin: 0 auto"></div>
					</div>
				</div>	
				</div>							
			</div>
		</div>					
	</div>
</div>

<?php
$transactionsModel = Transaction::model();
$dataProvider = $transactionsModel->getAccountTransactions($model->Id);
$chartData = $transactionsModel->getAccountCashflowJson($model->Id);
?>
<?php // echo '<pre>'.print_r($chartData,true).'<\pre>' ;?>

<script>
	jQuery(function($){
		window.data = <?php echo $chartData;?>;
		window.chartData = new Array()
		
		$.each(window.data, function(i,chartItem){
			chartItem = [chartItem.TransDate,parseFloat(chartItem.TransAmount)];
			window.chartData.push(chartItem); 
		});
			
			
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'area'
            },
            title: {
                text: 'Account balance history'
            },
            xAxis: {
				
            },
            yAxis: {
				
            },
            tooltip: {
                formatter: function() {
                    return '£'+ this.y;
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Date',
                data: window.chartData
            }]
        });
	});
</script>

<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon"><i class="icon icon-barcode"></i></span>
				<h5>Transactions</h5>
			</div>
			<div class="widget-content">
				<?php
				
				$this->widget('bootstrap.widgets.TbGridView', array(
					'type'=>'striped bordered condensed',
					'id' => 'account-transactions-grid',
					'dataProvider' => $dataProvider,
					'filter' => $transactionsModel,
					'pagerCssClass' =>'pagination alternate',
					'columns' => array(
						array(
							'name' => 'TransDate',
							'value' => 'date("M j, Y", $data->transDateInt)',
						),
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
							'header' => 'Depost',
							'value' => 'EMoney::isDeposit($data->TransAmount)',
							'htmlOptions'=>array('class'=>'green'),
						),
						array(
							'header' => 'Withdrawal',
							'value' => 'EMoney::isWithdrawal($data->TransAmount)',
							'htmlOptions'=>array('class'=>'red'),
						),
						array(
							'header'    => 'Balance',
							'class'     => 'TotalColumn',
							'attribute' => 'TransAmount',
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
