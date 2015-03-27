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
			$this->html .= 
				'<li>
					<a href="'.$category->link.'">'.$category->title.'</a>
					<div class="cbp-hrsub">
						<div class="cbp-hrsub-inner"> 
				</li>';
			
			foreach ($category->getItems()){
				
			}
			
			'<div class="cbp-hrsub">
								<div class="cbp-hrsub-inner"> 
									<div>
										<h4>Learning &amp; Games</h4>
										<ul>
											<li><a href="#">Catch the Bullet</a></li>
											<li><a href="#">Snoopydoo</a></li>
											<li><a href="#">Fallen Angel</a></li>
											<li><a href="#">Sui Maker</a></li>
											<li><a href="#">Wave Master</a></li>
											<li><a href="#">Golf Pro</a></li>
										</ul>
									</div>
									<div>
										<h4>Utilities</h4>
										<ul>
											<li><a href="#">Gadget Finder</a></li>
											<li><a href="#">Green Tree Express</a></li>
											<li><a href="#">Green Tree Pro</a></li>
											<li><a href="#">Wobbler 3.0</a></li>
											<li><a href="#">Coolkid</a></li>
										</ul>
									</div>
									<div>
										<h4>Education</h4>
										<ul>
											<li><a href="#">Learn Thai</a></li>
											<li><a href="#">Math Genius</a></li>
											<li><a href="#">Chemokid</a></li>
										</ul>
										<h4>Professionals</h4>
										<ul>
											<li><a href="#">Success 1.0</a></li>
											<li><a href="#">Moneymaker</a></li>
										</ul>
									</div>
								</div><!-- /cbp-hrsub-inner -->
							</div>'
		}
		
		$this->html .= '<li><a href="#">Все категории</a></li></ul></nav>';
	}
	
	public function run(){
		return $this->html;
	}
}