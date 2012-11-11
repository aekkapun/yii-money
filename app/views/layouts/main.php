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
                <li class="btn btn-inverse" ><a title="" href="/dashboard"><i class="icon icon-home"></i> <span class="text">Dashboard</span></a></li>
                <li class="btn btn-inverse" ><a title="" href=""><i class="icon icon-book"></i> <span class="text">Income &amp; Expenses</span></a></li>
                <li class="btn btn-inverse" ><a title="" href="/account"><i class="icon icon-briefcase"></i> <span class="text">Accounts</span></a></li>
                <li class="btn btn-inverse" ><a title="" href=""><i class="icon icon-calendar"></i> <span class="text">Bills &amp; Deposits</span></a></li>
                <li class="btn btn-inverse dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-tags"></i> <span class="text">Categories</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="/cat">Category Groups</a></li>
                        <li><a class="sAdd" title="" href="/subcat">Categories</a></li>
                    </ul>
                </li>
				<li class="btn btn-inverse"><a title="" href="/payee"><i class="icon icon-user"></i> <span class="text">Payees</span></a></li>
                <li class="btn btn-inverse"><a title="" href="/settings"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
                <li class="btn btn-inverse"><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>
		
		<?php echo $content; ?>
		
	</body>
</html>

