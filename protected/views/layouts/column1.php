<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'nav nav-list'),
		));
		$this->endWidget();
	?>
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>