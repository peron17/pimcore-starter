<?php
/** 
 * PT. Ako Media Asia (https://salt.co.id)
 * Copyright 2020
 *
 * Licensed Under MIT Lisence
 * Redistributions of files must retain the above copyright notice.
 *
 * @ Author: Tommy Priambodo
 * @ Create Time: 2020-07-28 16:57:17
 * @ Modified by: Tommy Priambodo
 * @ Modified time: 2020-07-28 16:57:24
 * @ Description:
 */
namespace AppBundle\Controller;

use Pimcore\Controller\FrontendController;
use Pimcore\Templating\Helper\Navigation;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ {
    Route,
    Method
};

class HomeController extends FrontendController
{
    public function defaultAction(Request $request)
    {
        
    }

    /**
     * @Route("/", name="home")
     * @Method("GET")
     */
    public function homeAction(Request $request)
    {
        
    }

    public function footerAction(Request $request)
    {
        
    }

    public function breadcrumbAction(Request $request)
    {
        
    }
}