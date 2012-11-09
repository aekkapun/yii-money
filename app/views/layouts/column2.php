<?php $this->beginContent('//layouts/main'); ?>

<!-- Sidebar starts -->
<div id="sidebar">
	<?php
	$this->widget('zii.widgets.CMenu', array(
	'encodeLabel' => false,
	'items' => array(
		array('label' => '<i class="icon icon-home"></i><span>Dashboard</span>', 'url' => array('transaction/index')),
		array('label' => '<i class="icon icon-book"></i><span>Accounts</span>', 'url' => '#',
			'itemOptions' => array('class' => 'submenu'),
			'items' => AccType::model()->getAccountTypeMenuItems(false)),
		array('label' => '<i class="icon icon-calendar"></i><span>Bills &amp; Deposits</span>', 'url' => array('/')),
		array('label' => '<i class="icon icon-folder-open"></i><span>Category</span>', 'url' => '#',
			'itemOptions' => array('class' => 'submenu'),
			'items' => array(
				array('label' => 'Category Groups', 'url' => '/cat/index'),
				array('label' => 'Categories', 'url' => '/subcat/index')
		)),
		array('label' => '<i class="icon icon-user"></i><span>Payees</span>', 'url' => array('payee/index')),
		array('label' => 'Login', 'url' => array('admin/login'), 'visible' => Yii::app()->user->isGuest),
		array('label' => 'Logout', 'url' => array('admin/logout'), 'visible' => !Yii::app()->user->isGuest),
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


