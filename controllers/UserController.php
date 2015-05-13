<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\forms\LoginForm;

class UserController extends Controller
{
	public function behaviors()
	{
		return [
				'access' => [
						'class' => AccessControl::className(),
						'only' => ['logout'],
						'rules' => [
								[
										'actions' => ['logout'],
										'allow' => true,
										'roles' => ['@'],
								],
						],
				],
				'verbs' => [
						'class' => VerbFilter::className(),
						'actions' => [
								'logout' => ['post'],
						],
				],
		];
	}

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
	
	public function actionLogin()
	{
		if (!\Yii::$app->user->isGuest) {
			return $this->goHome();
		}
	
		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		} else {
			return $this->render('login', [
					'model' => $model,
			]);
		}
	}

    public function actionRegistration()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegistrationForm();
        if ($model->load(Yii::$app->request->post()) && $model->registration()) {
            return $this->goBack();
        } else {
            return $this->render('registration', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}