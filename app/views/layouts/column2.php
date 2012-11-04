<?php $this->beginContent('//layouts/main'); ?>
<div id="sidebar">
	<!--Accounts menu-->
	<?php
	$this->widget('zii.widgets.CMenu', array(
		'items' => Account::model()->getAccountMenuItems(),
			)
		);
	?>
</div>
<div id="content">
	
	<div id="content-header">
		<h1><?php echo $this->viewHeading;?></h1>
		<div class="btn-group">

			<!--Admin / Tasks menu-->
			<?php // if(!empty($this->tasksMenu)):?>
<!--						<?php // $this->widget('bootstrap.widgets.TbMenu', array(
//							'type'=>'list',
//							'items'=>$this->tasksMenu,
//							'htmlOptions'=>array(
//								'class'=>'sidebar-nav'
//							),
//						));
					?>	-->
			<?php // endif;?>

			<a class="btn btn-large tip-bottom" title="Add new account"><i class="icon-plus"></i></a>
			<a class="btn btn-large tip-bottom" title="Edit this account"><i class="icon-edit"></i></a>
		</div>
	</div>
	
	<?php if (isset($this->breadcrumbs)): ?>
		<?php
		$this->widget('zii.widgets.CBreadcrumbs', array(
			'separator'=>'',
			'links' => $this->breadcrumbs,
			'htmlOptions'=>array(
				'id'=>'breadcrumb'
			),
		));
		?><!-- breadcrumbs -->
	<?php endif ?>
	
	<div class="container-fluid">
		<?php echo $content; ?>
	</div>
		
</div>
<?php $this->endContent(); ?>


