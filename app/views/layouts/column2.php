<?php $this->beginContent('//layouts/main'); ?>
<div class="span3">
	<div class="well sidebar-nav">
		<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title' => 'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items' => $this->menu,
			'htmlOptions' => array('class' => 'nav nav-list'),
		));
		$this->endWidget();
		?>
	</div>
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


