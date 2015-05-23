<?php
use app\components\Thumbnail;
use yii\helpers\Url;
use yii\bootstrap\Progress;

$this->title = "Описать идею";
$this->registerJs("
	function showSubcategory(id){
		$.ajax({
			url: '".Url::toRoute(["/category/subcategory"])."',
			data: {'id':id},
			success: function(json){
				result = JSON.parse(json);
				if($('#post-content').has('#subcategories')){
					$('#subcategories').remove();
				}
				
				html = '<div id=\"subcategories\" class=\"row\"><p>Выберите категорию '+result.genitive+'</p>';

				result.data.forEach(function(item) {
					html += '".Thumbnail::widget([
        				'text' => '%title', 
        				'img' => '%img',
        				'link' => '%link',
        				'size' => 2,
        			])."'.replace(\"%title\", item.title).replace(\"%img\", item.img).replace(\"%link\", item.postLink);
				});
				
				html += '</div>';
		
				$('#post-content').append(html);
		
				$('html, body').animate({
					scrollTop: $(\"#subcategories\").offset().top
				}, 1000);
			}
		});	
	}", $this::POS_HEAD);
?>
<div class="post-index">
	<?php 
	/*echo Progress::widget([
			'percent' => 30,
			'options' => ['id' => 'post-progress']
	]);*/
	?>
    <div id="post-content" class="body-content">
        <div id="categories" class="row">
			<p>Сначала скажите, что вы хотите сделать</p>
        	<?php
        	foreach ($model->getCategories() as $category){
        		echo Thumbnail::widget([
        				'text' => $category->title, 
        				'img' => $category->getImage(),
        				'script' => 'showSubcategory('.$category->id.')',
        				'size' => 2,
        		]);
        	}
        	?>
        </div>
    </div>
</div>