<?php

namespace AppBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Model\Document\Tag\Area\Info;
use voku\helper\AntiXSS;
use Pimcore\Model\DataObject;

class GalleryPanel extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Gallery Panel';
    }

    public function getDescription()
    {
        return 'Gallery Panel';
    }

    public function action(Info $info)
    {
        $gallery_list = new DataObject\Gallery\Listing();
        $gallery_list->setOrderKey('o_id');
        $gallery_list->setOrder("desc");
        $gallery_list->load();

        $info->getView()->gallery_list = $gallery_list;
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}