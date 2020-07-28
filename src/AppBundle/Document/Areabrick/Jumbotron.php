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

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class Jumbotron extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Jumbotron image';   
    }

    public function getDescription()
    {
        return 'Jumbotron image';   
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