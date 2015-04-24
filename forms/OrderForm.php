<?php

namespace app\forms;

use Yii;
use yii\base\Model;
use app\models\Category;

class OrderForm extends Model
{
	public $currentCategory;

	public function setCurrentCategory($id)
	{
		$this->currentCategory = Category::findCategoryById($id);
	}

	public function getCategories()
	{
		return Category::findCategories();
	}

	public function getSubcategories()
	{
		return Category::findSubcategories($this->currentCategory->id);
	}
}