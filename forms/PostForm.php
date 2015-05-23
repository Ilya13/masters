<?php

namespace app\forms;

use Yii;
use yii\base\Model;
use app\models\Category;
use app\models\Post;

class PostForm extends Model
{
	public $size;
	public $material;
	public $budgetFrom;
	public $budgetTo;
	public $details;
	
	public $category;
	
	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
			[['size', 'material', 'budgetFrom', 'budgetTo'], 'required'],
			['details', 'string', 'max' => 255],
		];
	}
	
	public function setCategory($id)
	{
		$this->category = Category::findCategoryById($id);
	}

	public function getCategories()
	{
		return Category::findCategories();
	}

	public function getSubcategories()
	{
		return Category::findSubcategories($this->category->id);
	}
	
	public function create()
	{
		if ($this->validate()) {
			$post = new Post();
			$post->userId = Yii::$app->user->identity->id;
			$post->categoryId = $this->category->id;
			$post->size = $this->size;
			$post->material = $this->material;
			$post->budgetFrom = $this->budgetFrom;
			$post->budgetTo = $this->budgetTo;
			$post->details = $this->details;
			
			Yii::info('details: '.$post->details, 'pushNotifications');
			
			return $post->save();
		} else {
			return false;
		}
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'size' => 'Размер',
				'material' => 'Материалы',
				'budgetFrom' => 'от',
				'budgetTo' => 'до',
				'details' => 'Описание',
		);
	}
}