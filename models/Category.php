<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

class Category extends \yii\db\ActiveRecord
{
	private $items = array();
	
	public function getItems()
	{
		return $this->items;
	}
	
	public static function findCategoryById($id)
	{
		return parent::find()->where(['id' => $id])->one();
	}
	
	public static function findCategoryByTitle($title)
	{
		return parent::find()->where(['title' => $title])->one();
	}
	
	public static function findNavigatorCategories($parent = null)
	{
		$result = array();
		$elements = parent::find()->where(['active' => 1])->all();
		foreach ($elements as $element){
			if ($element->navigator == 1 and $element->parent == $parent){
				$element->setItems(self::findChildrens($elements, $element->id));
				array_push($result, $element);
			}
		}
		return $result;
	}
	
	public static function findCategories()
	{
		return parent::find()->where(['active' => 1, 'level' => 1])->orderBy('order')->all();
	}
	
	private static function findChildrens($elements, $parent)
	{
		$result = array();
		foreach ($elements as $element){
			if ($element->parent == $parent){
				array_push($result, $element);
			}
		}
		return $result;
	}
	
	public static function findSubcategories($id)
	{
		return parent::find()->where(['parent' => $id, 'active' => 1])->all(); 
	}
	
	public static function tableName()
	{
		return 'categories';
	}
	
	public function setItems($items)
	{
		$this->items = $items;
	}
	
	public function getImage(){
		return 'img/categories/'.$this->image;
	}
	
	public function getLink(){
		return Url::toRoute(['/site/category/', 'id' => $this->id]);
	}
}