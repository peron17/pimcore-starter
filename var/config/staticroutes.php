<?php 

return [
    1 => [
        "id" => 1,
        "name" => "articles_detail",
        "pattern" => "/\\/blog\\/(.*)\\/(.*)/",
        "reverse" => "/blog/%category/%slug",
        "module" => NULL,
        "controller" => "@AppBundle\\Controller\\ArticleController",
        "action" => "detail",
        "variables" => "category,slug",
        "defaults" => NULL,
        "siteId" => [

        ],
        "methods" => [

        ],
        "priority" => 1,
        "creationDate" => 1595906964,
        "modificationDate" => 1595909289
    ]
];
