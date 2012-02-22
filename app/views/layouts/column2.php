<?php $this->beginContent('//layouts/main'); ?>
<div class="span3">
	<div class="sidebar-nav">
		<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title' => false,
		));
		$this->widget('zii.widgets.CMenu', array(
			'items' => $this->menu,
			'htmlOptions' => array('class' => 'nav nav-tabs nav-stacked'),
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


