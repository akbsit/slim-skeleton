<?php
/**
 * Appointment: Главная страница
 * File: IndexController.php
 * Version: 0.0.1
 * Author: Anton Kuleshov
 **/

namespace App\Controllers;

/**
 * Class IndexController
 * @package App\Controllers
 */
class IndexController extends Controller
{
    /**
     * @param $oRequest
     * @param $oResponse
     * @return string
     */
    public function index($oRequest, $oResponse)
    {
        return $this->view->render($oResponse, 'index.twig', [
            'name' => $this->config->APP_NAME,
            'charset' => $this->config->APP_CHARSET,
            'local' => $this->config->APP_LOCAL
        ]);
    }
}