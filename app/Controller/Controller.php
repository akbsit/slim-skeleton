<?php namespace App\Controller;

/**
 * Class Controller
 * @package App\Controller
 */
class Controller
{
    /* @var object */
    protected $oContainer;

    /**
     * Controller constructor
     *
     * @param $oContainer
     */
    public function __construct($oContainer)
    {
        return $this->oContainer = $oContainer;
    }

    /**
     * @param $sProperty
     *
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
