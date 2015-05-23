<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\forms\CategoryForm;

class CategoryController extends Controller
{
	public function actionIndex($id = null)
	{
		$model = new CategoryForm();
		if (!isset($id)){
			return $this->render('index', [
					'model' => $model,
			]);
		} else {
			$model->setCurrentCategoryById($id);
			return $this->render('index', [
					'model' => $model,
			]);
		}
	}
	
	public function actionSubcategory($id)
	{
		$result = new \stdClass();
		$model = new CategoryForm();
		$model->setCurrentCategoryById($id);
		$result->genitive = $model->currentCategory->genitive;
		$result->data = CategoryForm::getArrayMap($model->getSubcategories());
		return json_encode($result);
	}
}