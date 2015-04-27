<?php
use app\components\Thumbnail;

$this->title = "Описать идею";
?>
<p>Сначала скажите, что вы хотите сделать</p>
<div class="site-index">
    <div class="body-content">
        <div id="categories" class="row">
        	<?php
        	foreach ($model->getCategories() as $category){
        		echo Thumbnail::widget([
        				'text' => $category->title, 
        				'img' => $category->getImage(),
        				'size' => 2,
        		]);
        	}
        	?>    
        </div>
    </div>
</div>