<?php
namespace app\components;

use yii\base\Widget;

class Thumbnail extends Widget{
	private $html;
	
	public $img;
	public $label;
	public $text;
	public $link;
	public $script;
	public $button;
	public $clickable = false;
	public $size = 2;
	
	public function init(){
		parent::init();
		$this->html = '<div class="col-md-'.$this->size.'"><div class="thumbnail">';
		if (isset($this->link) and isset($this->script)){
			$this->html .= '<a href='.$this->link.' onclick='.$this->script.'>';
		} else if (isset($this->link)){
			$this->html .= '<a href='.$this->link.'>';
		} else if (isset($this->script)){
			$this->html .= '<a onclick='.$this->script.'>';
		}
		if (isset($this->img)){
			$this->html .= '<img class="img-rounded" src='.$this->img.'>';
		}
		if (isset($this->label) or isset($this->text) or isset($this->link) or isset($this->button)){
			$this->html .= '<div class="caption text-center">';
			
			if (isset($this->label)){
				$this->html .= '<h3>'.$this->label.'</h3>';
			}
			if (isset($this->text)){
				$this->html .= '<p>'.$this->text.'</p>';
			}
			if (isset($this->button)){
				$this->html .= '<p>'.$this->button.'</p>';
			}
			$this->html .= '</div>';
		}
		if (isset($this->link) or isset($this->script)){		
			$this->html .= '</a>';
		}
		$this->html .= '</div></div>';
	}
	
	public function run(){
		return $this->html;
	}
}