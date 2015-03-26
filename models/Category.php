<?php

namespace app\models;

class User extends \yii\db\ActiveRecord
{
	public static function getNavigatorCategories()
	{
		return parent::find()->where(['active' => 1, 'navigator' => 1]);
	}
	
	public static function tableName()
	{
		return 'categories';
	}
}