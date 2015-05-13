<?php
use yii\helpers\Html;

$this->title = 'Мастерская';
?>
<div class="site-index">
	
	<?php if (!Yii::$app->user->isGuest){
		echo '<div class="jumbotron">';
        echo Html::a('Описать идею', ['/post'], ['class'=>'btn btn-primary']);
    	echo '</div>';
	}?>
    

    <div class="body-content">

    </div>
</div>
