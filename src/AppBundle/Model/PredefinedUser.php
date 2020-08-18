<?php
/** 
 * PT. Ako Media Asia (https://salt.co.id)
 * Copyright 2020
 *
 * Licensed Under MIT Lisence
 * Redistributions of files must retain the above copyright notice.
 *
 * @ Author: Tommy Priambodo
 * @ Create Time: 2020-08-10 21:54:18
 * @ Modified by: Tommy Priambodo
 * @ Modified time: 2020-08-10 21:54:19
 * @ Description:
 */

namespace AppBundle\Model;

use Pimcore\Model\AbstractModel;

class PredefinedUser extends AbstractModel
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $email;

    /**
     * get score by id
     *
     * @param $id
     * @return null|self
     */
    public static function getById($id) {
        try {
            $obj = new self;
            $obj->getDao()->getById($id);
            return $obj;
        } catch (\Exception $e) {
            return $e;
        }
        return null;
    }

    /**
     * @param $email
     * @return null|self
     */
    public static function getByEmail($email)
    {
        try {
            $obj = new self;
            $obj->getDao()->getByEmail($email);
            return $obj;
        } catch (\Exception $e) {
            return null;
        }

        return null;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId() 
    {
        return $this->id;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getEmail() 
    {
        return $this->email;
    }
}