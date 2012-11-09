<?php
// Set breadcrumbs
$this->breadcrumbs = array(
	'Accounts'
);

// Add available tasks / actions
$this->tasksMenu=array('create');

// Set view haeading
$this->viewHeading = 'Accounts';
?>

<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon"><i class="icon icon-user"></i></span>
				<h5>Accounts</h5>
			</div>
			<div class="widget-content">
				<?php
					$this->widget('bootstrap.widgets.TbGridView', array(
						'type'=>'striped bordered condensed',
						'id' => 'account-grid',
						'dataProvider' => $model->search(),
						'pagerCssClass' =>'pagination alternate',
						'filter' => $model,
						'columns' => array(
							array(
								'name' => 'AccTypeId',
								'value' => '$data->relAccType->AccTypeName',
							),
							'AccName',
							'OverDraftLimit',
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