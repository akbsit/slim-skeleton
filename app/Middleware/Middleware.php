<?php
/**
 * Appointment: Базовый посредник
 * File: Middleware.php
 * Version: 0.0.1
 * Author: Anton Kuleshov
 **/

namespace App\Middleware;

/**
 * Class Middleware
 * @package App\Middleware
 */
class Middleware
{
    /**
     * @var
     */
    protected $oContainer;

    /**
     * Middleware constructor.
     * @param $oContainer
     */
    public function __construct($oContainer)
    {
        return $this->oContainer = $oContainer;
    }
}