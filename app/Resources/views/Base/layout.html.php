<?php
/** 
 * PT. Ako Media Asia (https://salt.co.id)
 * Copyright 2020
 *
 * Licensed Under MIT Lisence
 * Redistributions of files must retain the above copyright notice.
 *
 * @ Author: Tommy Priambodo
 * @ Create Time: 2020-07-28 16:59:06
 * @ Modified by: Tommy Priambodo
 * @ Modified time: 2020-07-28 17:03:28
 * @ Description:
 */
$web_name = \Pimcore\Model\WebsiteSetting::getByName('web_name');

$document = $this->document; 
if(!$document instanceof \Pimcore\Model\Document\Page) 
    $document = \Pimcore\Model\Document\Page::getById(1);

$mainNavStartNode = $this->document->getProperty("navigationRoot");
if(!$mainNavStartNode instanceof \Pimcore\Model\Document\Page) 
    $mainNavStartNode = \Pimcore\Model\Document\Page::getById(1);

$mainNavigation = $this->navigation()->build(['active' => $document, 'root' => $mainNavStartNode]);
dd($this->navigation()->menu());
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->headMeta()->appendName('description', 'This is my first pimcore landing page') ?>
    <?php $this->headMeta()->appendName('author', 'Tommy Priambodo') ?>
    <?php $this->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8') ?>
    <?php $this->headMeta()->appendName('viewport', 'width=device-width, initial-scale=1.0') ?>
    <?= $this->headMeta() ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <?php $this->headLink()->appendStylesheet('/theme/css/bootstrap.min.css') ?>
    <?php $this->headLink()->appendStylesheet('/theme/css/custom.css') ?>
    <?php $this->headLink(['rel' => 'icon', 'href' => '/theme/img/favicon.png'], 'PREPEND') ?>
    <?= $this->headLink() ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><?= $web_name->getData() ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php $this->slots()->output('_content') ?>
</body>

</html>