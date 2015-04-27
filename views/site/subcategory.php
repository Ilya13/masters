<?php
use app\components\Thumbnail;

$this->title = $model->currentCategory->title;
$this->params['breadcrumbs'][] = ['label' => 'Все категории', 'url' => ['category', 'id'=>0]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
        	<?php 
        	foreach ($model->getSubcategories() as $category){
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
