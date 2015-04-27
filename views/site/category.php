<?php
use app\components\Thumbnail;

$this->title = 'Все категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
        	<?php
        	foreach ($model->getCategories() as $category){
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
