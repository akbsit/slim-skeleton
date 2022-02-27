<?php

use \App\Middleware\CsrfGuardMiddleware;

$oApp->get('/', 'IndexController:index')->add(new CsrfGuardMiddleware($oContainer));
