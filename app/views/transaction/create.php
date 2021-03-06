<?php
$this->breadcrumbs = array(
	'Transactions' => array('index'),
	'Create',
);

$this->menu = array(
	array('label' => 'List Transactions', 'url' => array('index')),
	array('label' => 'Manage Transactions', 'url' => array('admin')),
);

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap-tabs.js', CClientScript::POS_HEAD);

?>

<div class="row-fluid">
	<h1>Create a Transaction</h1>
	<div class="form-tabs">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#withdrawal" data-toggle="tab">Withdrawal</a></li>
			<li><a href="#deposit" data-toggle="tab">Deposit</a></li>
			<li><a href="#transfer" data-toggle="tab">Transfer</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="withdrawal">
				<h3>Withdrawal</h3>
				<?php echo $this->renderPartial('_formWithdrawal', array('model' => $model)); ?>	
			</div>
			<div class="tab-pane" id="deposit">
				<h3>Deposit</h3>
				<?php echo $this->renderPartial('_formDeposit', array('model' => $model)); ?>	
			</div>
			<div class="tab-pane" id="transfer">
				<h3>Transfer</h3>
				<?php echo $this->renderPartial('_formTransfer', array('model' => $model)); ?>	
			</div>
		</div>		
	</div>
</div>