<?php

namespace app\models;

class Post extends \yii\db\ActiveRecord
{
	public static function tableName(){
		return 'posts';
	}
	
	public static function getActiveProjects($userId){
		return parent::find()->where(['active' => 1, 'userId' => $userId])->all();
	}
	
	public static function getClosedProjects($userId){
		return parent::find()->where(['active' => 0, 'userId' => $userId])->all();
	}
}