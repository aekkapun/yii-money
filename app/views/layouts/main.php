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
			<h1><a href="<?php echo Yii::app()->homeUrl;?>">Yii Money</a></h1>		
		</div>
		
		<div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse" ><a title="" href="/transaction"><i class="icon icon-barcode"></i> <span class="text">Transactions</span></a></li>
                <li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-star"></i> <span class="text">Favorite Accounts</span> <b class="caret"></b></a>
                <!--<li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-star"></i> <span class="text">Favorite Accounts</span> <span class="label label-success">3</span> <b class="caret"></b></a>-->
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#">First Direct Current Account</a></li>
                        <li><a class="sAdd" title="" href="#">Natwest Joint Account</a></li>
                        <li><a class="sAdd" title="" href="#">Barclay Card</a></li>
                    </ul>
                </li>
                <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
                <li class="btn btn-inverse"><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>
		
		
<!--		<div id="user-nav" class="navbar navbar-inverse">
			<?php
//			$this->widget('zii.widgets.CMenu', array(
//				'htmlOptions' => array(
//					'class' => 'nav btn-group'
//				),
//				'encodeLabel' => false,
//				'items' => array(
//					array('label' => '<i class="icon icon-book"></i><span>Accounts</span>', 'url' => '#',
//						'linkOptions' => array('class' => 'btn btn-inverse dropdown'),
//						'items' => AccType::model()->getAccountTypeMenuItems(false)),
////						'submenuHtmlOptions' => array('class' => 'dropdown-menu'),
//				)
//			));
			?>
        </div>-->
		
		<?php echo $content; ?>
	</body>
</html>

