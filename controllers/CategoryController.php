<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\forms\CategoryForm;

class CategoryController extends Controller
{
	public function actionSubcategory($title)
	{
		$model = new CategoryForm();
		$model->findCategoryByTitle($title);
		$data = CategoryForm::getArrayMap($model->getSubcategories());
		return json_encode($data);
	}
}