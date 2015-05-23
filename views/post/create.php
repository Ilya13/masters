<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\Popover;

$this->title = "Описать идею";
$this->registerJs("
	$('#post-form').find('input.form-control, textarea.form-control').each(function(){
		$(this).focusin(function(){
			showPopover($(this));
		});
		$(this).focusout(function(){
			hidePopover();
		});
	});
		
	function getPopoverContent(property){
		switch(property){
			case 'size':
				return '<p>Укажите размер</p>';
			case 'material':
				return '<p>Укажите материал</p>';
			case 'budgetFrom':
				return '<p>Укажите минимальную цену</p>';
			case 'budgetTo':
				return '<p>Укажите максимальную цену</p>';
			case 'details':
				return '<p>Укажите детали</p>';
			case 'city':
				return '<p>Укажите город</p>';
			default:
				return '';
		}
	}
		
	function showPopover(input){
		var popover = '".Popover::widget(['title' => 'Заголовок', 'content' => '%content', 'id' => '%id'])."';
		popover = popover
			.replace('%content', getPopoverContent(input.attr('id').split('-')[1]))
			.replace('%id', input.attr('id') + '-popover');
		
		$('#popover').html(popover);
		
		popover = $('#' + input.attr('id') + '-popover');
		popover.css({ top: (input.position().top - (popover.height() - input.height())/2) + 'px' });
	}
		
	function hidePopover(){
		$('#popover').html('');
	}
");
?>

<div class="post-create">
	<div class="row">	    
	    <p>Пожалуйста, заполните данные о заказе:</p>	    
	    <div class="col-md-5">
		
		    <?php $form = ActiveForm::begin([
		        'id' => 'post-form',
		        'options' => ['class' => 'form-horizontal'],
		        'fieldConfig' => [
		            'template' => '{label}{input}',
		            'labelOptions' => ['class' => 'control-label'],
		        ],
		    ]); ?>
	    
			    <?= $form->field($model, 'size') ?>
			
			    <?= $form->field($model, 'material') ?>
								
				<div class="form-group">
					
					<div><label class="control-label" for="postform-budgetfrom">Бюджет</label></div>
					
				    <?= $form->field($model, 'budgetFrom', ['options' => ['class' => 'form-range from'], 'template' => '<div class="col-md-1">{label}</div><div class="col-md-10">{input}</div>']) ?>
				
				    <?= $form->field($model, 'budgetTo', ['options' => ['class' => 'form-range to'], 'template' => '<div class="col-md-1">{label}</div><div class="col-md-10">{input}</div>']) ?>
			
				</div>
			
			    <?= $form->field($model, 'details')->textArea(['rows' => '6']) ?>
			
			    <div class="form-group">
			        <div class="col-md-offset-1 col-md-5">
			            <?= Html::submitButton('Далее', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
			        </div>
			    </div>
	
    		<?php ActiveForm::end(); ?>
    	
		</div>
	
		<div id="popover" class="col-md-5"></div>
	
    </div>
</div>