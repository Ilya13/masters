<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\Navigator;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$this->registerJs('$(function(){cbpHorizontalMenu.init();});');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Мастера',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo '<form class="navbar-form navbar-left" role="search">
					<div class="form-search search-only">
						<i class="search-icon glyphicon glyphicon-search"></i>
						<input class="form-control search-query">
					</div>
			      </form> ';
            
            if (Yii::$app->user->isGuest){
            	echo '<button type="button" class="btn btn-danger navbar-btn navbar-right">Мастер</button>';
            	echo Nav::widget([
            			'options' => ['class' => 'navbar-nav navbar-right'],
            			'items' => [
            					['label' => 'Вход', 'url' => ['/site/login']],
            					['label' => 'Регистрация', 'url' => ['/site/registration']],            					
            			],
            	]);
            } else {
            	echo Nav::widget([
	                'options' => ['class' => 'navbar-nav navbar-right'],
	                'items' => [
	                    ['label' => 'Выход (' . Yii::$app->user->identity->username . ')',
	                            'url' => ['/site/logout'],
	                            'linkOptions' => ['data-method' => 'post']],
	                ],
	            ]);
            }
	            
            NavBar::end();
        ?>
		
		<?= Navigator::widget() ?>
		
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
