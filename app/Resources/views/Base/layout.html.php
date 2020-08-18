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

$document = $this->document; 
if(!$document instanceof \Pimcore\Model\Document\Page) 
    $document = \Pimcore\Model\Document\Page::getById(1);

$mainNavStartNode = $this->document->getProperty("navigationRoot");
if(!$mainNavStartNode instanceof \Pimcore\Model\Document\Page) 
    $mainNavStartNode = \Pimcore\Model\Document\Page::getById(1);

$mainNavigation = $this->navigation()->build(['active' => $document, 'root' => $mainNavStartNode]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->headMeta()->appendName('description', 'This is my first pimcore landing page') ?>
    <?php $this->headMeta()->appendName('author', 'Tommy Priambodo') ?>
    <?php $this->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8') ?>
    <?php $this->headMeta()->appendName('viewport', 'width=device-width, initial-scale=1.0') ?>
    <?= $this->headMeta() ?>

    <?php $this->headTitle()->append('Pimcore') ?>
    <?php $this->headTitle()->setSeparator(" | ") ?>
    <?= $this->headTitle() ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
    <?php $this->headLink()->appendStylesheet('/theme/css/bootstrap.min.css') ?>
    <?php $this->headLink()->appendStylesheet('/theme/css/custom.css') ?>
    <?php $this->headLink(['rel' => 'icon', 'href' => '/theme/img/favicon.png'], 'PREPEND') ?>
    <?= $this->headLink() ?>
</head>

<body>
    <!--navigation  -->
    <?= $this->navigation()->menu()->renderPartial($mainNavigation, 'Base/nav.html.php')?>
    <main>
        <div class="container">
            <?= $this->snippet('breadcrumb') ?>

            <?php $this->slots()->output('_content') ?>
        </div>
    </main>

    <footer>
        <div class="container text-center">
            <?= $this->snippet('footer') ?>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.7/holder.js" integrity="sha512-uhp2Ee4MNexF4HNrWF5Vo82DIq6bvfdEcDJEqOAVy7q2h2I4HsZTFgfEoHt7+j/Ez2cEeJ0yyrZZxcGeY9aT+A==" crossorigin="anonymous"></script>

    <?php $this->headScript()->appendFile('/theme/js/bootstrap.min.js') ?>
    <?= $this->headScript() ?>
</body>

</html>