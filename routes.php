<?php
/**
 * Appointment: Маршрутизаторы
 * File: routes.php
 * Version: 0.0.4
 * Author: Anton Kuleshov
 **/

use \App\Middleware\CsrfGuardMiddleware;

$oApp->get('/', 'IndexController:index')->add(new CsrfGuardMiddleware($oContainer));