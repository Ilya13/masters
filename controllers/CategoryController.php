<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\forms\CategoryForm;

class CategoryController extends Controller
{
	public function actionSubcategory($id)
	{
		$result = new \stdClass();
		$model = new CategoryForm();
		$model->findCategoryById($id);
		$result->genitive = $model->currentCategory->genitive;
		$result->data = CategoryForm::getArrayMap($model->getSubcategories());
		return json_encode($result);
	}
}