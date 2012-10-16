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
	
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = array();
	public $tasksMenu = array(array('label'=>'Administrate'));
	
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs = array();
	
	
	/**
	 * Add CSS and JS after yii assets
	 */
	public function initCss()
	{
		$cssFiles = array('yii-money');
		foreach ($cssFiles as $cssFile)
			Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/css/' . $cssFile . '.css', '');
	}

	public function initJs()
	{
//		$jsFiles = array('bootstrap-tabs');
//		foreach($jsFiles as $jsFile){
//			Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/'.$jsFile.'.js', '');
//		}
	}
}