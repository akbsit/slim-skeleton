<?php
/**
 * Appointment: Добавление контроллеров в контейнер
 * File: controllers.php
 * Version: 0.0.1
 * Author: Anton Kuleshov
 **/

$oContainer['IndexController'] = function ($oContainer) {
    return new \App\Controllers\IndexController($oContainer);
};