<?php

namespace AppBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class ImageWithText extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Image With Text';
    }

    public function getDescription()
    {
        return 'Image With Text';
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