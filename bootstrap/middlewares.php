<?php
/**
 * Appointment: Добавление посредников в контейнер
 * File: middlewares.php
 * Version: 0.0.2
 * Author: Anton Kuleshov
 **/

$oApp->add(new \App\Middleware\CsrfGuardMiddleware($oContainer));