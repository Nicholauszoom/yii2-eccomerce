<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendor/fontawesome-free/css/all.min.css',
        'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i',
        'css/sb-admin-2.min.css'
    ];
    public $js = [
    ]; 
    public $depends = [
        'yii\web\YiiAsset',
        JqueryAsset::class,
        'yii\bootstrap5\BootstrapAsset',
    ];
    public $jsOptions =  [
        'vendor/jquery/jquery.min.js',
        "vendor/bootstrap/js/bootstrap.bundle.min.js",
        "vendor/jquery-easing/jquery.easing.min.js",
        "js/sb-admin-2.min.js",
        'vendor/chart.js/Chart.min.js',
        'js/demo/chart-area-demo.js',
        'js/demo/chart-pie-demo.js',

    ];
}
