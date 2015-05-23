<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Category;

class Navigator extends Widget{
	private $html;
	
	public function init(){
		parent::init();
		$categories = Category::findNavigatorCategories();
		
		$this->html = '<nav id="cbp-hrmenu" class="cbp-hrmenu"><ul>';
		
		foreach ($categories as $category){
			$this->html .= '<li><a href="'.$category->getLink().'">'.$category->title.'</a>';			
			
			if (count($category->getItems()) != 0){
				$this->html .= '<div class="cbp-hrsub"><div class="cbp-hrsub-inner">';
				
				$cnt = 0;
				foreach ($category->getItems() as $item){
					if ($cnt == 0){
						$this->html .= '<div><ul>';
					}
					
					$this->html .= '<li><a href="'.$item->link.'">'.$item->title.'</a></li>';
				
					$cnt++;
					if ($cnt == 4){
						$this->html .= '</ul></div>';
						$cnt = 0;
					}
				}
					
				if ($cnt != 0){
					$this->html .= '</ul></div>';
				}

				$this->html .= '</div></div>';
			}

			$this->html .= '</li>';
		}
		$this->html .= '<li>'.Html::a('Все категории', ['/category']).'</li></ul></nav>';
	}
	
	public function run(){
		return $this->html;
	}
}