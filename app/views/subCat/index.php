<?php
$this->breadcrumbs = array(
	'Categories'
);

$this->tasksMenu[]=array('label'=>'Accounts Home', 'icon'=>'home', 'url'=>array('/account'));
$this->tasksMenu[]='---';
$this->tasksMenu[]=array('label'=>'New Category', 'icon'=>'pencil', 'url'=>array('create'));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('sub-cat-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row-fluid">
	<h1>Categories</h1>
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
	<?php
	$this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'id' => 'sub-cat-grid',
		'dataProvider' => $model->search(),
		'filter' => $model,
		'columns' => array(
			array(
				'name' => 'CatId',
				'value' => '$data->relCat->CategoryName',
			),
			'SubCatName',
			'CatType',
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'htmlOptions'=>array('style'=>'width: 50px'),
			)
		)
	));
	?>
</div>