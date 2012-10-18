<?php
$this->breadcrumbs=array(
	'Accounts'
);

$this->tasksMenu[]=array('label'=>'New Account', 'icon'=>'pencil', 'url'=>array('create'));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('account-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row-fluid">
	<h1>Manage Accounts</h1>
	<div class="row-fluid">
		<div class="action-buttons">
			<?php echo CHtml::Link('Add New Account',array('create'),array('class'=>'btn btn-success')); ?>
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
	<h2>Accounts</h2>
	<?php
	$this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'id' => 'account-grid',
		'dataProvider' => $model->search(),
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