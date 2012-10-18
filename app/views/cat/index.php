<?php
$this->breadcrumbs = array(
	'Category Groups'
);

$this->tasksMenu[]=array('label'=>'Accounts Home', 'icon'=>'home', 'url'=>array('/account'));
$this->tasksMenu[]='---';
$this->tasksMenu[]=array('label'=>'New Category Group', 'icon'=>'pencil', 'url'=>array('create'));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cat-grid', {
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

<br/>
<br/>
<div class="row-fluid">
	<h2>Main Categories</h2>
	<?php
	$this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'id' => 'cat-grid',
		'dataProvider' => $model->search(),
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

