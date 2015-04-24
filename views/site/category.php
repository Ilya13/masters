<?php
use yii\helpers\Html;

$this->title = 'Все категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
        	<?php 
        	foreach ($model->getCategories() as $category){
        		echo ' <div class="col-lg-4"><img/>'.Html::a($category->title, ['/site/category/', 'id'=>$category->id]).'</div>';
        	}
        	?>    
        </div>
    </div>
</div>
