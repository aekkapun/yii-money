<?php
// Set breadcrumbs
$this->breadcrumbs = array(
	'Categories'
);

// Add available tasks / actions
$this->tasksMenu=array('create');

// Set view haeading
$this->viewHeading = 'Categories';

?>

<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon"><i class="icon icon-user"></i></span>
				<h5>Categories</h5>
			</div>
			<div class="widget-content">
				<?php
				$this->widget('bootstrap.widgets.TbGridView', array(
					'type' => 'striped bordered condensed',
					'id' => 'sub-cat-grid',
					'dataProvider' => $model->search(),
					'pagerCssClass' =>'pagination alternate',
					'filter' => $model,
					'columns' => array(
						array(
							'name' => 'CatId',
							'header' => 'Category Group',
							'value' => '$data->relCat->CategoryName',
						),
						array(
							'type' => 'raw',
							'header' => 'Category',
							'name' => 'CatId',
							'value' => 'EMoney::subCatLink($data)',
						),
						'CatType',
						array(
							'class' => 'bootstrap.widgets.TbButtonColumn',
							'htmlOptions' => array('style' => 'width: 50px'),
						)
					)
				));
				?>
			</div>
		</div>
	</div>
</div>


