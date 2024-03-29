<?php namespace App\Controller;

/**
 * Class IndexController
 * @package App\Controller
 */
class IndexController extends Controller
{
    /**
     * @param $oRequest
     * @param $oResponse
     *
     * @return string
     */
    public function index($oRequest, $oResponse)
    {
        return $this->view->render($oResponse, 'index.html.twig', [
            'name'    => $this->config->APP['NAME'],
            'charset' => $this->config->APP['CHARSET'],
            'local'   => $this->config->APP['LOCAL'],
        ]);
    }
}
