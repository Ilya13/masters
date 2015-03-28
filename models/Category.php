<?php

namespace app\models;

class Category extends \yii\db\ActiveRecord
{
	private $items = array();
	
	public function getItems()
	{
		return $this->items;
	}
	
	public static function getNavigatorCategories()
	{
		return parent::find()->where(['active' => 1, 'navigator' => 1])->all();
	}
	
	public static function tableName()
	{
		return 'categories';
	}
	
	public function addItem($item)
	{
		rray_push($this->items, $item);
	}
}