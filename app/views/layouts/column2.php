<?php $this->beginContent('//layouts/main'); ?>

<!-- Sidebar starts -->
<div id="sidebar-accounts">
	<?php
	$this->widget('zii.widgets.CMenu', array(
		'encodeLabel' => false,
		'items' => array(
			array('label' => '<h4>Bank Accounts</h4>', 'url' => array('acctype/view', 'id' => 1),
				'itemOptions' => array('class' => 'account-list'),
				'items' => Account::model()->getAccountMenuItems(1)
			),
			array('label' => '<h4>Credit Accounts</h4>', 'url' => array('acctype/view','id' => 2),
				'itemOptions' => array('class' => 'account-list'),
				'items' => Account::model()->getAccountMenuItems(2)
			),
			array('label' => '<h4>Savings Accounts</h4>', 'url' => array('acctype/view', 'id' => 5),
				'itemOptions' => array('class' => 'account-list'),
				'items' => Account::model()->getAccountMenuItems(5)
			),
			array('label' => '<h4>Loans & Liabilities</h4>', 'url' => array('acctype/view', 'id' => 3),
				'itemOptions' => array('class' => 'account-list'),
				'items' => Account::model()->getAccountMenuItems(3)
			),
			array('label' => '<h4>Other Accounts</h4>', 'url' => array('acctype/view', 'id' => 4),
				'itemOptions' => array('class' => 'account-list'),
				'items' => Account::model()->getAccountMenuItems(4)
			)
		)
	));
	?>
</div>
<!-- Sidebar ends -->

<div id="content">
	
	<!-- Content header start -->
	<div id="content-header">
		<h1><?php echo $this->viewHeading; ?></h1>
		<?php echo Yii::app()->controller->renderTaskButtons();?>
	</div>
	<!-- Content header ends -->
	
	<!-- Breadcrumbs start -->
	<?php if (isset($this->breadcrumbs)): ?>
		<?php
		$this->widget('zii.widgets.CBreadcrumbs', array(
			'separator' => '',
			'links' => $this->breadcrumbs,
			'htmlOptions' => array(
				'id' => 'breadcrumb'
			),
		));
		?>
	<?php endif ?>
	<!-- Breadcrumbs end -->
	
	<!-- Main content starts -->
	<div class="container-fluid">
		<?php echo $content; ?>
	</div>
	<!-- Main content ends -->	
	
</div>

<?php $this->endContent(); ?>


