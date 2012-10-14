<?php $this->beginContent('//layouts/main'); ?>
<div class="span3">
	
	<!--Admin / Tasks menu-->
	<?php if(!empty($this->tasksMenu)):?>
		<div class="sidebar-nav">
			<?php $this->widget('bootstrap.widgets.TbMenu', array(
				'type'=>'list',
				'items'=>$this->tasksMenu
			));
			?>	
		</div>
	<?php endif;?>
	
	<!--Custom menu-->
	<?php if(!empty($this->menu)):?>
		<div class="sidebar-nav">
			<?php $this->widget('bootstrap.widgets.TbMenu', array(
				'type'=>'list',
				'items'=>$this->menu
			));
			?>	
		</div>
	<?php endif;?>
	
	<!--Accounts menu-->
	<div class="sidebar-nav">
		<?php
		$this->widget('bootstrap.widgets.TbMenu', array(
			'type' => 'list',
			'items' => Account::model()->getAccountMenuItems()
				)
			);
		?>
	</div>
	
</div>
<div class="span9">
	<div class="row-fluid">
		<?php if (isset($this->breadcrumbs)): ?>
			<?php
			$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
				'links' => $this->breadcrumbs,
			));
			?><!-- breadcrumbs -->
		<?php endif ?>	
	</div>
	<?php echo $content; ?>
</div>
<?php $this->endContent(); ?>


