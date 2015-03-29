<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        	'css/site.css',
        	'css/navigator.css',
    		'bootflat/css/bootflat.min.css',
    ];
    public $js = [
    		'js/cbpHorizontalMenu.min.js',
    		'js/modernizr.custom.js',
    		'bootflat/js/icheck.min.js',
    		'bootflat/js/jquery.fs.selecter.min.js',
    		'bootflat/js/jquery.fs.stepper.min.js',
    ];
    public $depends = [
        	'yii\web\YiiAsset',
        	'yii\bootstrap\BootstrapAsset',
    ];
}
