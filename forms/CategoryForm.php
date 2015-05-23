<?php

namespace app\forms;

use Yii;
use yii\base\Model;
use app\models\Category;

class CategoryForm extends Model
{
	public $currentCategory;
	
	public function setCurrentCategoryById($id)
	{
		$this->currentCategory = Category::findCategoryById($id);
	}
	
	public function setCurrentCategoryByTitle($title)
	{
		$this->currentCategory = Category::findCategoryByTitle($title);
	}
	
	public function getCategories()
	{
		return Category::findCategories();
	}
	
	public function getSubcategories()
	{
		return Category::findSubcategories($this->currentCategory->id);
	}
	
	public static function getArrayMap($array)
	{
		return array_map(create_function('$m','return $m->getAttributes(array(\'id\',\'title\',\'image\',\'postLink\'));'), $array);
	}
}