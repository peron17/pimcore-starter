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
        "modificationDate" => 1596106299
    ],
    2 => [
        "id" => 2,
        "name" => "category_detail",
        "pattern" => "/\\/blog\\/(.*)",
        "reverse" => "/blog/%category",
        "module" => NULL,
        "controller" => "@AppBundle\\Controller\\ArticleController",
        "action" => "category",
        "variables" => "category",
        "defaults" => NULL,
        "siteId" => [

        ],
        "methods" => [

        ],
        "priority" => 2,
        "creationDate" => 1596106191,
        "modificationDate" => 1596106315
    ],
    3 => [
        "id" => 3,
        "name" => "test",
        "pattern" => "/\\/test/",
        "reverse" => "/test",
        "module" => NULL,
        "controller" => "@AppBundle\\Controller\\DefaultController",
        "action" => "default",
        "variables" => NULL,
        "defaults" => NULL,
        "siteId" => [

        ],
        "methods" => [

        ],
        "priority" => 0,
        "creationDate" => 1597315092,
        "modificationDate" => 1597315127
    ]
];
