<?php
/** 
 * PT. Ako Media Asia (https://salt.co.id)
 * Copyright 2020
 *
 * Licensed Under MIT Lisence
 * Redistributions of files must retain the above copyright notice.
 *
 * @ Author: Tommy Priambodo
 * @ Create Time: 2020-07-30 17:56:22
 * @ Modified by: Tommy Priambodo
 * @ Modified time: 2020-07-30 17:56:26
 * @ Description:
 */

namespace AppBundle\Controller;

use AppBundle\Model\PredefinedUser;
use AppBundle\Services\Member;
use Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ {
    Method,
    Route
};
use Symfony\Component\HttpFoundation\Session\Session;
use voku\helper\AntiXSS;

class AuthController extends FrontendController
{
    private $session;

    public function __construct()
    {
        $this->session = new Session;
    }
    /**
     * @Route("/auth/login", name="login")
     * @Method({"GET","POST"})
     */
    public function loginAction(Request $request)
    {
        if($request->getSession()->has('token')) {
            return $this->redirectToRoute('home');
        }

        if ($request->isMethod("POST")) {
            $xss = new AntiXSS;
            $email = $xss->xss_clean($request->get('email'));

            $model = PredefinedUser::getByEmail($email);
            
            if ($model) {
                // predefined user founded
                $this->session->getFlashBag()->add('_fm', [
                    's' => 'success',
                    'd' => $model
                ]);
            } else 
                $this->session->getFlashBag()->add('_fm', [
                    's' => 'error',
                    'm' => 'user not found'
                ]);   
        }
    }

    /**
     * @Route("/auth/registration", name="registration")
     * @Method("GET")
     */
    public function registrationAction(Request $request)
    {
        
    }

    /**
     * @Route("/auth/register", name="register")
     * @Method("POST")
     */
    public function registerAction(Request $request)
    {
        Member::saveMember($request);

        return $this->redirect('/');
    }
}