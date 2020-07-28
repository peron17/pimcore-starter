<?php 
/** 
 * PT. Ako Media Asia (https://salt.co.id)
 * Copyright 2020
 *
 * Licensed Under MIT Lisence
 * Redistributions of files must retain the above copyright notice.
 *
 * @ Author: Tommy Priambodo
 * @ Create Time: 2020-07-28 11:26:45
 * @ Modified by: Tommy Priambodo
 * @ Modified time: 2020-07-28 11:26:56
 * @ Description:
 */
namespace AppBundle\Services;

use Pimcore\Model\DataObject;
use voku\helper\AntiXSS;

class Articles 
{
    protected $model, $xss;

    public function __construct()
    {
        $this->model = new DataObject\Articles\Listing();
        $this->xss = new AntiXSS;
    }

    public function getAll()
    {
        $this->model->setOrderKey("oo_id");
        $this->model->setOrder("desc");
        return $this->model;
    }

    public function getDetail($slug)
    {
        $slug = $this->xss->xss_clean($slug);
        $this->model->setCondition("Slug = ? ", [$slug]);
        $this->model->load();
        return $this->model->getObjects()[0];
    }
}