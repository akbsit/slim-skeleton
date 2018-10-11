<?php
/**
 * Appointment: Посредник csrf
 * File: CsrfGuardMiddleware.php
 * Version: 0.0.3
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
     * @param $oRequest
     * @param $oResponse
     * @param $oNext
     * @return mixed
     */
    public function __invoke($oRequest, $oResponse, $oNext)
    {
        $this->view->getEnvironment()->addGlobal('csrf', [
            'field' => '
                <input type="hidden" name="' . $this->csrf->getTokenNameKey() . '" value="' . $this->csrf->getTokenName() . '">
                <input type="hidden" name="' . $this->csrf->getTokenValueKey() . '" value="' . $this->csrf->getTokenValue() . '">
            '
        ]);

        return $oNext($oRequest, $oResponse);
    }
}