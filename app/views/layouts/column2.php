<?php $this->beginContent('//layouts/main'); ?>
<div class="span3">
	<h3>Accounts</h3>
	<div class="sidebar-nav">
		<?php
			$this->widget('zii.widgets.CMenu', array(
				'htmlOptions' => array('class' => 'nav nav-pills nav-stacked'),
				'items' => Account::model()->getAccountMenuItems()
			));
		?>
	</div>

	<?php if(!empty($this->menu)):?>
		<h3>Tasks</h3>
		<div class="sidebar-nav">
			<?php
			$this->widget('zii.widgets.CMenu', array(
				'items' => $this->menu,
				'htmlOptions' => array('class' => 'nav nav-tabs nav-stacked'),
			));
			?>
		</div>
	<?php endif;?>
	
</div>
<div class="span9">
	<div class="row-fluid">
		<?php if (isset($this->breadcrumbs)): ?>
			<?php
			$this->widget('application.widgets.DBreadcrumbs', array(
				'links' => $this->breadcrumbs,
			));
			?><!-- breadcrumbs -->
		<?php endif ?>	
	</div>
	<?php echo $content; ?>
</div>
<?php $this->endContent(); ?>


