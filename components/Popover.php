<?php
namespace app\components;

use yii\base\Widget;

class Popover extends Widget{
	const RIGHT = 'right';
	const LEFT = 'left';
	const TOP = 'top';
	const BOTTOM = 'bottom';
	
	private $html;
	
	public $side;
	public $title;
	public $content;
	public $id;

	public function init(){
		parent::init();
		
		if(!isset($this->side)){
			$this->side = Popover::RIGHT;
		}
		
		$this->html = '<div class="popover '.$this->side.'"';
		
		if(isset($this->id)){
			$this->html .= ' id="'.$this->id.'"';
		}
		
		$this->html .= '><div class="arrow"></div>';
		
		if(isset($this->title)){
			$this->html .= '<h3 class="popover-title">'.$this->title.'</h3>';
		}
		if(isset($this->content)){
			$this->html .= '<div class="popover-content">'.$this->content.'</div>';
		}
		
		$this->html .= '</div>';
	}
	
	public function run(){
		return  $this->html;
	}
}