<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class Thumbnail extends Widget{
	private $html;
	
	public $img;
	public $label;
	public $text;
	public $link;
	public $clickable = false;
	public $size = 2;
	
	public function init(){
		parent::init();
		
		$this->html = "<div class='col-lg-".$this->size."'><div class='thumbnail'>";
		if (isset($this->img)){
			$this->html .= "<img class='img-rounded' src='".$this->img."'>";
		}
		if (isset($this->label) or isset($this->text) or isset($this->link)){
			$this->html .= "<div class='caption text-center'>";
			
			if (isset($this->label)){
				$this->html .= "<h3>".$this->label."</h3>";
			}
			if (isset($this->text)){
				$this->html .= "<p>".$this->text."</p>";
			}
			if (isset($this->link)){
				$this->html .= "<p>".$this->link."</p>";
			}
			
			$this->html .= "</div>";
		}
		
		$this->html .= "</div></div>";
	}
	
	public function run(){
		return $this->html;
	}
}