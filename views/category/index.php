<?php
use app\components\Thumbnail;

if (isset($model->currentCategory)){
	$this->title = $model->currentCategory->title;
	$this->params['breadcrumbs'][] = ['label' => 'Все категории', 'url' => ['index']];
} else {
	$this->title = 'Все категории';
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
        	<?php
        	$collection = isset($model->currentCategory) ?
        		$model->getSubcategories() :
        		$model->getCategories();
        	
        	foreach ($collection as $category){
        		echo Thumbnail::widget([
        				'text' => $category->title,
        				'img'  => $category->getImage(),
        				'link' => $category->getLink(),
        				'size' => 4,
        		]);
        	}
        	?>    
        </div>
    </div>
</div>
