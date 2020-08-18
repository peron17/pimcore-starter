<?php
/** 
 * PT. Ako Media Asia (https://salt.co.id)
 * Copyright 2020
 *
 * Licensed Under MIT Lisence
 * Redistributions of files must retain the above copyright notice.
 *
 * @ Author: Tommy Priambodo
 * @ Create Time: 2020-07-28 10:22:00
 * @ Modified by: Tommy Priambodo
 * @ Modified time: 2020-07-28 10:22:06
 * @ Description:
 */
namespace AppBundle\Controller;

use AppBundle\Services\Articles;
use Pimcore\Controller\FrontendController;
use Pimcore\Navigation\Renderer\Breadcrumbs;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends FrontendController
{
    protected $articles;

    public function __construct()
    {
        $this->articles = new Articles;
    }

    public function defaultAction(Request $request)
    {
        $this->view->categories = $this->articles->getCategories();
    }

    public function detailAction(Request $request, Breadcrumbs $breadcrumbs)
    {
        $this->view->article = $this->articles->getDetail($request->get('slug'));
    }

    public function categoryAction(Request $request)
    {
        
    }
}
