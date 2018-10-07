<?php
/**
 * Appointment: Базовый контроллер
 * File: Controller.php
 * Version: 0.0.1
 * Author: Anton Kuleshov
 **/

namespace App\Controllers;

/**
 * Class Controller
 * @package App\Controllers
 */
class Controller
{
    /**
     * @var
     */
    protected $oContainer;

    /**
     * Controller constructor.
     * @param $oContainer
     */
    public function __construct($oContainer)
    {
        return $this->oContainer = $oContainer;
    }

    /**
     * @param $sProperty
     * @return mixed
     */
    public function __get($sProperty)
    {
        if ($this->oContainer->{$sProperty}) {
            return $this->oContainer->{$sProperty};
        }

        return false;
    }
}