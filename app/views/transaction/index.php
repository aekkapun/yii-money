<?php
// Set breadcrumbs
$this->breadcrumbs = array(
	'Transactions'
);

// Add available tasks / actions
$this->tasksMenu=array('create');

// Set view haeading
$this->viewHeading = 'Transactions';

Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').slideToggle();
		return false;
	});
	$('.search-form form').submit(function(){
		$.fn.yiiGridView.update('transactions-grid', {
			data: $(this).serialize()
		});
		return false;
	});
");

?>

<div class="row-fluid">
	<div class="row-fluid">
		<div class="action-buttons">
			<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn btn-primary btn-info')); ?>
		</div>
	</div>
</div>

<div class="row-fluid">
		<div class="search-form" style="display:none">
		<?php
		$this->renderPartial('_search', array(
			'model' => $model,
		));
		?>
	</div><!-- search-form -->	
</div>

<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon"><i class="icon icon-barcode"></i></span>
				<h5>All Transactions</h5>
			</div>
			<div class="widget-content">
				<?php
					$this->widget('bootstrap.widgets.TbGridView', array(
						'type'=>'striped bordered condensed',
						'id' => 'transactions-grid',
						'pagerCssClass' =>'pagination alternate',
						'dataProvider' => $model->search(),
						'filter' => $model,
						'columns' => array(
							array(
								'name' => 'AccountId',
								'type' => 'raw',
								'value' => 'CHtml::link($data->relAccount->AccName,"/account/view/id/$data->AccountId")'
							), array(
								'name' => 'TransDate',
								'value' => 'date("M j, Y", $data->transDateInt)',
							),
							'TransType',
							array(
								'name' => 'PayeeId',
								'type' => 'raw',
								'value' => 'CHtml::link($data->relPayee->PayeeName,"/payee/view/id/$data->PayeeId")'
							),
							array(
								'name' => 'SubCatId',
								'type' => 'raw',
								'value' => 'CHtml::link($data->relSubCat->getCatName($data->SubCatId).$data->relSubCat->SubCatName,"/subcat/view/id/$data->SubCatId")'
							),
							array(
								'name' => 'TransAmount',
								'value' => 'Yii::app()->numberFormatter->formatCurrency($data->TransAmount,Yii::app()->params->currency)',
							),
							array(
								'class'=>'bootstrap.widgets.TbButtonColumn',
								'htmlOptions'=>array('style'=>'width: 50px'),
							)
						)
					));
				?>		
			</div>
		</div>
	</div>
</div>


