<?php
/**
 * Appointment: Посредник для главной страницы
 * File: IndexMiddleware.php
 * Version: 0.0.1
 * Author: Anton Kuleshov
 **/

namespace App\Middleware;

/**
 * Class IndexMiddleware
 * @package App\Middleware
 */
class IndexMiddleware extends Middleware
{
    /**
     * @param $request
     * @param $response
     * @param $next
     * @return mixed
     */
    public function __invoke($request, $response, $next)
    {
        return $next($request, $response);
    }
}