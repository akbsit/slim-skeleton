<?php
/**
 * Appointment: Добавление посредников в контейнер
 * File: middlewares.php
 * Version: 0.0.1
 * Author: Anton Kuleshov
 **/

$oApp->add(new \App\Middleware\IndexMiddleware($oContainer));