<?php

/*
 * Class to change the html mark up of breadcrumbs DDL
 */
Yii::import('zii.widgets.CBreadcrumbs');

class DBreadcrumbs extends CBreadcrumbs {

	public $tagName = 'ul';
	public $htmlOptions = array('class' => 'breadcrumb');
	public $separator = '<span class="divider">/</span>';

	public function run() {
		if (empty($this->links))
			return;

		echo CHtml::openTag($this->tagName, $this->htmlOptions) . "\n";
		$links = array();

		if ($this->homeLink === null)
			$links[] = '<li>' . CHtml::link(Yii::t('zii', 'Home'), Yii::app()->homeUrl) . '</li>';
		else if ($this->homeLink !== false)
			$links[] = '<li><a>' . $this->homeLink . '</a></li>';
		foreach ($this->links as $label => $url) {
			if (is_string($label) || is_array($url))
				$links[] = '<li>' . CHtml::link($this->encodeLabel ? CHtml::encode($label) : $label, $url) . '</li>';
			else
				$links[] = '<li><a>' . ($this->encodeLabel ? CHtml::encode($url) : $url) . '</a></li>';
		}
		echo implode($this->separator, $links);
		echo CHtml::closeTag($this->tagName);
	}

}