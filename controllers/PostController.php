<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\forms\LoginForm;
use app\forms\ContactForm;
use app\forms\RegistrationForm;
use app\forms\CategoryForm;
use app\forms\PostForm;

class PostController extends Controller
{
	public function actions()
	{
		return [
				'error' => [
						'class' => 'yii\web\ErrorAction',
				],
				'captcha' => [
						'class' => 'yii\captcha\CaptchaAction',
						'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
				],
		];
	}
	
	public function actionIndex()
	{
		$model = new PostForm();
		return $this->render('index', [
			'model' => $model,
		]);
	}
    
    public function actionCreate($category)
    {
    	if (Yii::$app->user->isGuest) {
    		return $this->goHome();
    	}
    	
    	$model = new PostForm();
		$model->setCategory($category);
    	if ($model->load(Yii::$app->request->post()) && $model->create()) {
    		$this->redirect(Url::toRoute(['/user/']));
    	} else {
    		return $this->render('create', [
    			'model' => $model,
    		]);
    	}
    }
}