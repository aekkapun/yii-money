<?php
$this->breadcrumbs = array(
	'Accounts' => array('index'),
	'Manage',
);

$this->menu = array(
	array('label' => 'List Accounts', 'url' => array('index')),
	array('label' => 'Create Accounts', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('accounts-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row-fluid">
	<h1>Manage Accounts</h1>
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
		'id' => 'accounts-grid',
		'dataProvider' => $model->search(),
		'filter' => $model,
		'columns' => array(
			array(
				'name' => 'AccTypeId',
				'value' => '$data->accType->AccTypeName',
			),
			'AccName',
			'OverDraftLimit',
			array(
				'class' => 'CButtonColumn',
				'deleteButtonImageUrl' => Yii::app()->baseUrl.'/images/form-reset.png',
				'updateButtonImageUrl' => Yii::app()->baseUrl.'/images/form-edit.png',
				'viewButtonImageUrl' => Yii::app()->baseUrl.'/images/form-submit.png',
			)
		)
	));
	?>

</div>