<?php
/**
 * Appointment: Посредник csrf
 * File: CsrfGuardMiddleware.php
 * Version: 0.0.2
 * Author: Anton Kuleshov
 **/

namespace App\Middleware;

/**
 * Class CsrfGuardMiddleware
 * @package App\Middleware
 */
class CsrfGuardMiddleware extends Middleware
{
    /**
     * @param $request
     * @param $response
     * @param $next
     * @return mixed
     */
    public function __invoke($request, $response, $next)
    {
        $this->view->getEnvironment()->addGlobal('csrf', [
            'field' => '
                <input type="hidden" name="' . $this->csrf->getTokenNameKey() . '" value="' . $this->csrf->getTokenName() . '">
                <input type="hidden" name="' . $this->csrf->getTokenValueKey() . '" value="' . $this->csrf->getTokenValue() . '">
            '
        ]);

        return $next($request, $response);
    }
}