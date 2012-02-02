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
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	
	/**
	 * trying to load style sheets after yii assets DDL
	 */
public function initCss(){

        $CssFiles = array('bootstrap','Nii','yii-money');
        foreach($CssFiles as $Css){
               Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/'.$Css.'.css', '');
        }
    }
	
}


/*
 * Class to change the html mark up of breadcrumbs DDL
 */

class CBreadcrumbs extends CWidget
{
        public $tagName='ul';
        public $htmlOptions=array('class'=>'breadcrumb');
        public $encodeLabel=true;
        public $homeLink;
        public $links=array();
        public $separator='<span class="divider">/</span>';
        public function run()
        {
                if(empty($this->links))
                        return;

                echo CHtml::openTag($this->tagName,$this->htmlOptions)."\n";
                $links=array();
                
                if($this->homeLink===null)
                        $links[]='<li>'.CHtml::link(Yii::t('zii','Home'),Yii::app()->homeUrl).'</li>';
                else if($this->homeLink!==false)
                        $links[]='<li><a>'.$this->homeLink.'</a></li>';
                foreach($this->links as $label=>$url)
                {
                        if(is_string($label) || is_array($url))
                                $links[]='<li>'.CHtml::link($this->encodeLabel ? CHtml::encode($label) : $label, $url).'</li>';
                        else
                                $links[]='<li><a>'.($this->encodeLabel ? CHtml::encode($url) : $url).'</a></li>';
                }
                echo implode($this->separator,$links);
                echo CHtml::closeTag($this->tagName);
        }
}

