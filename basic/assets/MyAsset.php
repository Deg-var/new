<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'blog/css/bootstrap.min.css',
        'blog/css/font-awesome.min.css',
        'blog/css/elegant-icons.css',
        'blog/css/owl.carousel.min.css',
        'blog/css/slicknav.min.css',
        'blog/css/style.css',
    ];
    public $js = [
        // 'blog/js/jquery-3.3.1.min.js',
        'blog/js/bootstrap.min.js',
        'blog/js/jquery.slicknav.js,',
        'blog/js/owl.carousel.min.js',
        'blog/js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
