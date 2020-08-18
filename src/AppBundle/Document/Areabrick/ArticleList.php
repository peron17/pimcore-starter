<?php
/** 
 * PT. Ako Media Asia (https://salt.co.id)
 * Copyright 2020
 *
 * Licensed Under MIT Lisence
 * Redistributions of files must retain the above copyright notice.
 *
 * @ Author: Tommy Priambodo
 * @ Create Time: 2020-07-27 13:17:13
 * @ Modified by: Tommy Priambodo
 * @ Modified time: 2020-07-27 13:17:21
 * @ Description:
 */
namespace AppBundle\Document\Areabrick;

use AppBundle\Services\Articles;
use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Model\DataObject;
use Pimcore\Model\Document\Tag\Area\Info;

class ArticleList extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Article List';   
    }

    public function getDescription()
    {
        return ' list untuk menampilkan semua article';   
    }

    public function action(Info $info)
    {
        $article = new Articles();
        // $article_list = new DataObject\Articles\Listing();
        // $article_list->setOrderKey('o_id');
        // $article_list->setOrder("desc");
        // $article_list->load();

        $info->getView()->article_list = $article->getAll();
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}