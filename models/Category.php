<?php

namespace app\models;

class Category extends \yii\db\ActiveRecord
{
	private $items = array();
	
	public function getItems()
	{
		return $this->items;
	}
	
	public static function getNavigatorCategories($parent = null)
	{
		//return parent::find()->where(['active' => 1, 'navigator' => 1])->all();
		$result = array();
		$elements = parent::find()->where(['active' => 1])->all();
		foreach ($elements as $element){
			if ($element->navigator == 1 and $element->parent == $parent){
				$element->setItems(self::findChildrens($element->id, $elements));
				array_push($result, $element);
			}
		}
		return $result;
	}
	
	private static function findChildrens($parent, $elements){
		$result = array();
		foreach ($elements as $element){
			if ($element->parent == $parent){
				array_push($result, $element);
			}
		}
		return $result;
	}
	
	public static function tableName()
	{
		return 'categories';
	}
	
	public function setItems($items)
	{
		$this->items = $items;
	}
}