<?php
/** 
 * PT. Ako Media Asia (https://salt.co.id)
 * Copyright 2020
 *
 * Licensed Under MIT Lisence
 * Redistributions of files must retain the above copyright notice.
 *
 * @ Author: Tommy Priambodo
 * @ Create Time: 2020-08-10 22:01:19
 * @ Modified by: Tommy Priambodo
 * @ Modified time: 2020-08-10 22:01:46
 * @ Description:
 */

namespace AppBundle\Model\PredefinedUser;

use Pimcore\Model\Dao\AbstractDao;

class Dao extends AbstractDao
{
    protected $tableName = 'predefined_user';

    public function getById($id = null)
    {
        if ($id != null) $this->model->setId($id);
        $data = $this->db->fetchRow("select * from ".$this->tableName." where id=?", $this->model->getId());

        if (!$data['id'])
            throw new \Exception("doesn't exist");

        $this->assignVariablesToModel($data);
    }

    public function getByEmail($email)
    {
        $data = $this->db->fetchRow("select * from ".$this->tableName." where email=?", $email);

        if (!$data['email'])
            throw new \Exception("doesn't exist");

        $this->assignVariablesToModel($data);
    }
}