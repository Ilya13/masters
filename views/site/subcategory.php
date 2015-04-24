<?php
$this->title = $model->currentCategory->title;
$this->params['breadcrumbs'][] = ['label' => 'Все категории', 'url' => ['category', 'id'=>0]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
        	<?php 
        	foreach ($model->getSubcategories() as $category){
        		echo ' <div class="col-lg-4"><img/><p>'.$category->title.'</p></div>';
        	}
        	?>    
        </div>
    </div>
</div>
