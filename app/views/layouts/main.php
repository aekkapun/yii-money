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
		<div id="header">
			<h1><a href="<?php echo Yii::app()->homeUrl;?>">Yii Personal Finance</a></h1>		
		</div>
		
<!--		<div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse" ><a title="" href="/payee"><i class="icon icon-user"></i> <span class="text">Payees</span></a></li>
                <li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#">new message</a></li>
                        <li><a class="sInbox" title="" href="#">inbox</a></li>
                        <li><a class="sOutbox" title="" href="#">outbox</a></li>
                        <li><a class="sTrash" title="" href="#">trash</a></li>
                    </ul>
                </li>
                <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
                <li class="btn btn-inverse"><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>-->
		
		<?php $this->widget('bootstrap.widgets.TbNavbar', array(
			'type'=>'inverse', // null or 'inverse'
			'fixed'=>null,
			'brand'=>false,
			'htmlOptions'=>array(
				'id'=>'user-nav',
			),
			'items'=>array(
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions' => array('class' => 'btn-group'),
					'items' => array(
						array('label' => 'Transactions', 'url' => array('/transaction'),
							'htmlOptions' => array('class'=>'btn btn-inverse'),
						),
						
						array('label' => 'Category', 'url' => '#',
							'htmlOptions' => array('class'=>'btn btn-inverse','htmlOptions' => array('class'=>'btn btn-inverse'),),
							'items' => array(
								array('label'=>'Category Groups', 'url' => '/cat'),
								array('label'=>'Categories', 'url' => '/subcat')
						)),
						array('label' => 'Accounts', 'url' => '#',
							'items' => AccType::model()->getAccountTypeMenuItems(false)),
						array('label' => 'Payees', 'url' => array('/payee')),
						array('label' => 'Login', 'url' => array('admin/login'), 'visible' => Yii::app()->user->isGuest),
					),
				),
//				array(
//					'class'=>'bootstrap.widgets.TbMenu',
//					'htmlOptions'=>array('class'=>'pull-right'),
//					'items'=>array(
//						array('label'=>Yii::app()->user->name, 'url'=>'#', 'items'=>array(
//							array('label'=>'Logout', 'url' => array('admin/logout'), 'visible' => !Yii::app()->user->isGuest),
//						)),
//					),
//				),
			),
		)); ?>
		
		<?php echo $content; ?>
	</body>
</html>

