<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout = '//layouts/column1';
	public $viewHeading = '';
	
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = array();
	public $tasksMenu = array();
	
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs = array();
	
	
	/**
	 * Add CSS after yii assets
	 */
	public function initCss()
	{
		$cssFiles = array(
			'fullcalendar',
			'unicorn.main',
			'unicorn.grey',
			'yii-money'
		);
		foreach ($cssFiles as $cssFile)
			Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/css/' . $cssFile . '.css', '');
	}

	/**
	 * Add JS after yii assets
	 */
	public function initJs()
	{
		$jsFiles = array(
			'excanvas.min',
			'jquery.ui.custom',
			'jquery.flot.min',
			'jquery.flot.resize.min',
			'jquery.peity.min',
			'fullcalendar.min',
			'unicorn',
			'unicorn.dashboard'
		);
		foreach($jsFiles as $jsFile){
			Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/'.$jsFile.'.js', '');
		}
	}
}