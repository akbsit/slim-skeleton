<?php
/**
 * Appointment: Базовый валидатор
 * File: Validator.php
 * Version: 0.0.3
 * Author: Anton Kuleshov
 **/

namespace App\Validation;

use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;

/**
 * Class Validator
 * @package App\Validation
 */
class Validator
{
    /**
     * @var
     */
    protected $oContainer;

    /**
     * @var Factory
     */
    protected $oFactory;

    /**
     * @var array
     */
    public $arError = [];

    /**
     * Validator constructor.
     * @param $oContainer
     */
    public function __construct($oContainer)
    {
        $this->oContainer = $oContainer;

        $oTranslator = new Translator(
            new ArrayLoader(),
            $this->config->APP['LOCAL']
        );

        return $this->oFactory = new Factory($oTranslator);
    }

    /**
     * @param array $arData
     * @param array $arRules
     * @param array $arMessages
     * @return $this
     */
    public function validate($arData = [], $arRules = [], $arMessages = [])
    {
        if (!$arMessages) {
            $arMessages = array_change_key_case($this->config->VALIDATOR['MESSAGES']);
        }

        $oValidate = $this->oFactory->make($arData, $arRules, $arMessages);

        if ($oValidate->fails()) {
            $this->arError = $oValidate->messages()->getMessages();
        }

        return $this;
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