<?php
/** 
 * PT. Ako Media Asia (https://salt.co.id)
 * Copyright 2020
 *
 * Licensed Under MIT Lisence
 * Redistributions of files must retain the above copyright notice.
 *
 * @ Author: Tommy Priambodo
 * @ Create Time: 2020-08-03 11:43:05
 * @ Modified by: Tommy Priambodo
 * @ Modified time: 2020-08-03 11:43:17
 * @ Description:
 */

namespace AppBundle\Services;

use Pimcore\Model\DataObject;
use Pimcore\Navigation\Container;
use Symfony\Component\HttpFoundation\Request;
use voku\helper\AntiXSS;

class Member
{
    public static function saveMember(Request $request)
    {
        try {
            $antiXss = new AntiXSS;
            $email = $antiXss->xss_clean($request->get('email'));
            $fullname = $antiXss->xss_clean($request->get('fullname'));
            $password = $antiXss->xss_clean($request->get('password'));
    
            $obj = new DataObject\Member();
            $obj->setParentId(34);
            $obj->setKey('member_'.strtolower(str_replace(' ', '-', $fullname)));
            $obj->setEmail($email);
            $obj->setFullname($fullname);
            $obj->setPassword(password_hash($password, PASSWORD_BCRYPT));
            $obj->save();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}