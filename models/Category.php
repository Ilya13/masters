<?php

namespace app\models;

class Category extends \yii\db\ActiveRecord
{
	public static function getNavigatorCategories()
	{
		return parent::find()->where(['active' => 1, 'navigator' => 1])->all();
	}
	
	public static function tableName()
	{
		return 'categories';
	}
}