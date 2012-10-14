<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />
		<?php Yii::app()->controller->initCss(); ?>
		<?php Yii::app()->controller->initJs(); ?>
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>
	<body class="<?php echo Yii::app()->controller->action->id; ?>">
		<?php $this->widget('bootstrap.widgets.TbNavbar', array(
			'type'=>'inverse', // null or 'inverse'
			'brand'=>'Yii money',
			'brandUrl'=>'#',
			'collapse'=>true, // requires bootstrap-responsive.css
			'fluid'=>true,
			'fixed'=>'top',
			'items'=>array(
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions' => array('class' => 'nav'),
					'items' => array(
						array('label' => 'Transactions', 'url' => array('transaction/admin')),
						
						array('label' => 'Categories', 'url' => '#',
						'items' => array(
							array('label'=>'Main Categories', 'url' => '/cat/admin'),
							array('label'=>'Sub Categories', 'url' => '/subcat/admin')
						)),
						array('label' => 'Accounts', 'url' => '#',
							'items' => Account::model()->getAccountMenuItems(true,'Institutions',true)),
						array('label' => 'Payees', 'url' => array('payee/admin')),
						array('label' => 'Login', 'url' => array('admin/login'), 'visible' => Yii::app()->user->isGuest),
					),
				),
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array('class'=>'pull-right'),
					'items'=>array(
						array('label'=>Yii::app()->user->name, 'url'=>'#', 'items'=>array(
							array('label'=>'Logout', 'url' => array('admin/logout'), 'visible' => !Yii::app()->user->isGuest),
						)),
					),
				),
			),
		)); ?>
		<div class="container-fluid">
			<div class="row-fluid">
				<?php echo $content; ?>
			</div>
		</div>
	</body>
</html>

