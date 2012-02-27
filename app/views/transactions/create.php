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
Yii::app()->clientScript->registerScript('tabs', "

");
?>

<div class="row-fluid">
	<h1>Create a Transaction</h1>
    <ul class="nav nav-tabs">
		<li class="active"><a href="#withdrawal" data-toggle="tab">Withdrawal</a></li>
		<li><a href="#deposit" data-toggle="tab">Deposit</a></li>
		<li><a href="#transfer" data-toggle="tab">Transfer</a></li>
    </ul>
    <div class="tab-content">
		<div class="tab-pane active" id="withdrawal">
			<h3>Withdrawal</h3>
			<?php echo $this->renderPartial('_form', array('model' => $model)); ?>	
		</div>
		<div class="tab-pane" id="deposit">
			<h3>Deposit</h3>
			<?php echo $this->renderPartial('_form', array('model' => $model)); ?>	
		</div>
		<div class="tab-pane" id="transfer">
			<h3>Transfer</h3>
			<?php echo $this->renderPartial('_form', array('model' => $model)); ?>	
		</div>
    </div>
</div>