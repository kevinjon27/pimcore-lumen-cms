<?php


namespace AppBundle\Controller;


use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CoinController extends FrontendController
{
    /**
     * @Route("api/coin", name="add_coin", methods={"POST"})
     */
    public function add(Request $request)
    {

    }
}
