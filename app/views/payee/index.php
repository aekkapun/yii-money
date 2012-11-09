<?php
// Set breadcrumbs
$this->breadcrumbs = array(
	'Payees'
);

// Add available tasks / actions
$this->tasksMenu=array('create');

// Set view haeading
$this->viewHeading = 'Payees';

?>

<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon"><i class="icon icon-user"></i></span>
				<h5>Payees</h5>
			</div>
			<div class="widget-content">
				<?php
				$this->widget('bootstrap.widgets.TbGridView', array(
					'type'=>'striped bordered condensed',
					'id' => 'payee-grid',
					'pagerCssClass' =>'pagination alternate',
					'dataProvider' => $model->search(),
					'filter' => $model,
					'columns' => array(
						array(
							'name' => 'PayeeName',
							'type' => 'raw',
							'value' => 'EMoney::payeeLink($data)'
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
