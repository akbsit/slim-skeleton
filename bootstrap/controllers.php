<?php
/**
 * Appointment: Добавление контроллеров в контейнер
 * File: controllers.php
 * Version: 0.0.2
 * Author: Anton Kuleshov
 **/

$oContainer['IndexController'] = function ($oContainer) {
    return new \App\Controller\IndexController($oContainer);
};