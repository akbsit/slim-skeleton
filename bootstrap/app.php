<?php
/**
 * Appointment: Сборка приложения
 * File: app.php
 * Version: 0.0.3
 * Author: Anton Kuleshov
 **/

use \Skeleton\Env;
use \Skeleton\Folder;

session_start();

if (!include_once(__DIR__ . '/../vendor/autoload.php')) {
    exit('Composer autoload not found...');
}

Env::setLocalPath(__DIR__ . '/../.env.local');
Env::setProductionPath(__DIR__ . '/../.env.production');

$arEnvConfigs = Env::getProductionConfigs();

if (Env::isLocal()) {
    $arEnvConfigs = Env::getLocalConfigs();
}

if (!$arEnvConfigs) {
    exit('No env files found...');
}

$arAppConfigsList = Folder::scan(__DIR__ . '/../configs', 'files');

$arAppConfigs = [];

foreach ($arAppConfigsList as $sAppConfig) {
    $arAppConfigs = array_merge(
        $arAppConfigs,
        include_once(__DIR__ . '/../configs/' . $sAppConfig)
    );
}

$oConfigApp = (object)$arAppConfigs;

if (!(array)$oConfigApp) {
    exit('No configs files found...');
}

error_reporting($oConfigApp->APP_DEBUG ? E_ALL : 0);

$oApp = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => $oConfigApp->APP_DEBUG
    ]
]);

$oContainer = $oApp->getContainer();

$oContainer['config'] = $oConfigApp;

$oContainer['view'] = function ($oContainer) {
    $oView = new \Slim\Views\Twig(__DIR__ . '/../templates');

    $oView->addExtension(new \Slim\Views\TwigExtension(
        $oContainer->router,
        $oContainer->request->getUri()
    ));

    return $oView;
};

if (!include_once(__DIR__ . '/../bootstrap/controllers.php')) {
    exit('Not find container controllers...');
}

if (!include_once(__DIR__ . '/../bootstrap/middlewares.php')) {
    exit('Not find container middlewares...');
}

if (!include_once(__DIR__ . '/../routes.php')) {
    exit('Not find routes...');
}