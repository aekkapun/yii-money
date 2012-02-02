<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />

		<!-- blueprint CSS framework -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
		<!--[if lt IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
		<?php Controller::initCss(); ?>  <!-- trying to load style sheets after yii assets-->

		<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	</head>
	<body class="<?php echo Yii::app()->controller->action->id; ?>">
		<div class="container-fluid">
			<div class="navbar navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse"></a>
							<a class="brand" href="#"><em>Yii money</em></a>
							<div class="nav-collapse">
								<?php
								$this->widget('zii.widgets.CMenu', array(
									'htmlOptions' => array('class' => 'nav'),
									'items' => array(
//										array('label' => 'Home', 'url' => array('/site/index')),
										array('label' => 'Transactions', 'url' => array('/transactions/admin')),
										array('label' => 'Payees', 'url' => array('/payees/admin')),
										array('label' => 'Categories', 'url' => array('/cats/admin')),
										array('label' => 'Sub Categories', 'url' => array('/subcats/admin')),
										array('label' => 'Accounts', 'url' => array('/accounts/admin')),
										array('label' => 'Account Types', 'url' => array('/acctype/admin')),
										array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
										array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
									),
								));
								?>
							</div>
					</div>
				</div>
				<?php if (isset($this->breadcrumbs)): ?>
					<?php
					$this->widget('zii.widgets.CBreadcrumbs', array(
						'links' => $this->breadcrumbs,
					));
					?><!-- breadcrumbs -->

				<?php endif ?>
			</div>
			<div class="body">
				<div class="main">
					<?php echo $content; ?>
				</div>
			</div>
			<div id="footer">
				Copyright &copy; <?php echo date('Y'); ?> by Dan De Luca.<br/>All Rights Reserved.<br/><?php echo Yii::powered(); ?>
			</div><!-- footer -->
		</div>
	</body>
</html>
