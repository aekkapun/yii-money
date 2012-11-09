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
	 * @var string the content header title,
	 */
	public $viewHeading = '';
	
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = array();
	public $tasksMenu = array();

	/**
	 * @var array context menu items. This property will be responsible for holding task menu buttons config.
	 */
	public $taskMenuItems= array(
		'create'=> array('icon'=>'plus','title'=>'Add new '),
		'update'=> array('icon'=>'edit','title'=>'Edit '),
		'delete'=> array('icon'=>'trash','title'=>'Delete '),
	);
	
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
			'uniform',
			'chosen',
			'fullcalendar',
			'unicorn.main',
			'unicorn.grey',
			'yii-money'
		);
		foreach ($cssFiles as $cssFile)
			Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/css/' . $cssFile . '.css');
	}
	
	/**
	 * Add JS after yii assets
	 */
	public function initJs()
	{
		$jsFiles = array(
			'jquery.ui.custom',
			'unicorn',
			'highcharts',
			'highcharts-more',
			'exporting',
			'yii-money'
		);
		foreach($jsFiles as $jsFile){
			Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/'.$jsFile.'.js');
		}
	}

	/**
	 * @desc Renders top level task icons in the header, items are requested in the view as actions.
	 */
	public function renderTaskButtons()
	{
		$currentController = Yii::app()->controller->id;
		$queryId = Yii::app()->getRequest()->getQuery('id');

		$html = '<div class="btn-group">';
		foreach ($this->tasksMenu as $menuItem) {
			if (array_key_exists($menuItem, $this->taskMenuItems)) {
				$button = $this->taskMenuItems[$menuItem];
				$html.= CHtml::link('<i class="icon-' . $button['icon'] . '"></i>',
					array($currentController . '/' . $menuItem, $menuItem == 'create' ? '' : 'id' => $menuItem == 'create' ? '' : $queryId),
					array('class' => 'btn btn-large tip-bottom', 'title' => $button['title'] . $currentController));
			}
		}
		$html.='</div>';

		return $html;
	}
	
}