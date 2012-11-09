<?php
// Set breadcrumbs
$this->breadcrumbs = array(
	'Category Groups'
);

// Add available tasks / actions
$this->tasksMenu=array('create');

// Set view haeading
$this->viewHeading = 'Category Groups';

?>

<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon"><i class="icon icon-user"></i></span>
				<h5>Category Groups</h5>
			</div>
			<div class="widget-content">
				<?php
				$this->widget('bootstrap.widgets.TbGridView', array(
					'type'=>'striped bordered condensed',
					'id' => 'cat-grid',
					'dataProvider' => $model->search(),
					'pagerCssClass' =>'pagination alternate',
					'filter' => $model,
					'columns' => array(
						'CategoryName',
						'CatType',
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
