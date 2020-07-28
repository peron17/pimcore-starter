<?php
/** 
 * PT. Ako Media Asia (https://salt.co.id)
 * Copyright 2020
 *
 * Licensed Under MIT Lisence
 * Redistributions of files must retain the above copyright notice.
 *
 * @ Author: Tommy Priambodo
 * @ Create Time: 2020-07-27 15:19:48
 * @ Modified by: Tommy Priambodo
 * @ Modified time: 2020-07-27 15:19:58
 * @ Description:
 */
namespace AppBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class FooterPanel extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Footer Panel';   
    }

    public function getDescription()
    {
        return 'Footer Panel';   
    }

    public function hasEditTemplate()
    {
        return true;
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}
