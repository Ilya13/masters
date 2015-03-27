<?php
namespace app\components;

use yii\base\Widget;
use app\models\Category;

class Navigator extends Widget{
	private $html;
	
	public function init(){
		parent::init();
		$categories = Category::getNavigatorCategories();
		
		$this->html = '<nav id="cbp-hrmenu" class="cbp-hrmenu"><ul>';
		
		foreach ($categories as $category){
			$this->html .= '<li><a href="'.$category->link.'">'.$category->title.'</a></li>';
		}
		
		$this->html .= '<li><a href="#">Все категории</a></li></ul></nav>';
	}
	
	public function run(){
		return $this->html;
	}
}