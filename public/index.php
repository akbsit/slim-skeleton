<?php
/**
 * Appointment: Запуск приложения
 * File: index.php
 * Version: 0.0.1
 * Author: Anton Kuleshov
 **/

if (!include_once(__DIR__ . '/../bootstrap/app.php')) {
    exit('File integrity broken...');
}

$oApp->run();

session_destroy();