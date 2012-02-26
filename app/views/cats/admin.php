<?php
$this->breadcrumbs = array(
	'Cats' => array('index'),
	'Manage',
);

$this->menu = array(
	array('label' => 'List Cats', 'url' => array('index')),
	array('label' => 'Create Cats', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cats-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row-fluid">
	<h1>Manage Categories</h1>
	<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn btn-primary btn-info')); ?>
	<div class="search-form" style="display:none">
		<?php
		$this->renderPartial('_search', array(
			'model' => $model,
		));
		?>
	</div><!-- search-form -->
</div>

<div class="row-fluid">
	<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'cats-grid',
		'dataProvider' => $model->search(),
		'filter' => $model,
		'columns' => array(
			'CategoryName',
			'CatType',
			array(
				'class' => 'CButtonColumn',
				'deleteButtonImageUrl' => Yii::app()->baseUrl.'/images/form-reset.png',
				'updateButtonImageUrl' => Yii::app()->baseUrl.'/images/form-edit.png',
				'viewButtonImageUrl' => Yii::app()->baseUrl.'/images/form-submit.png',
			),
		),
	));
	?>
</div>