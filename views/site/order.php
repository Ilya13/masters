<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\components\Thumbnail;

$this->title = "Описать идею";

/*$this->registerJs(
	'$("#categories").children().each(function(index){
		var title = $(this).children()[1].textContent;
		$(this).on("click", function(){
			$.ajax({
				url: "'.\Yii::$app->urlManager->createUrl(['/category/subcategory']).'",
				data: {"title": title},
				success: function(result){
					var subcategories = JSON.parse(result);
					if (subcategories && subcategories.length > 0){
						var html = "<div id=\"subcategories\" class=\"row\">";
						subcategories.forEach(function(element){
							html += "<div class=\"col-lg-4 choice\"><img/><p>" + element.title + "</p></div>";
						});
						html += "</div>";
		        		$(".body-content").append(html);
					} else {
						$("#subcategories").remove();
					}
		    	}
			});
		});
	})'
);*/
?>
<p>Сначала скажите, что вы хотите сделать</p>
<div class="site-index">
    <div class="body-content">
        <div id="categories" class="row">
        	<?php 
        	foreach ($model->getCategories() as $category){
        		echo Thumbnail::widget(['text' => $category->title]);
        		//echo '<div class="col-lg-4 choice"><img/><p>'.$category->title.'</p></div>';
        	}
        	?>    
        </div>
    </div>
</div>