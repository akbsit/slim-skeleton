<?php
/**
 * Appointment: Маршрутизаторы
 * File: routes.php
 * Version: 0.0.2
 * Author: Anton Kuleshov
 **/

use App\Middleware\IndexMiddleware;

$oApp->get('/', 'IndexController:index')->add(new IndexMiddleware($oContainer));