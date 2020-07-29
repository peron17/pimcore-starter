
<?php
/**
* PT. Ako Media Asia (https://salt.co.id)
* Copyright 2020
*
* Licensed Under MIT Lisence
* Redistributions of files must retain the above copyright notice.
*
* @ Author: Tommy Priambodo
* @ Create Time: 2020-07-29 11:01:33
* @ Modified by: Tommy Priambodo
* @ Modified time: 2020-07-29 11:07:41
* @ Description:
*/
$web_name = \Pimcore\Model\WebsiteSetting::getByName('web_name');
// dd($this->get('session')->get('id'));
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/"><?= $web_name->getData() ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php if ($this->pages) : ?>
                    <?php foreach ($this->pages as $page) : ?>
                        <?php if (!$page->isVisible()) continue; ?>

                        <?php if (!$page->hasPages()) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $page->getHref() ?>">
                                    <?= ucwords(str_replace("-", " ", $page->getLabel())) ?>
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_<?= $page->getId() ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= ucwords(str_replace("-", " ", $page->getLabel())) ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_<?= $page->getId() ?>">
                                    <?php foreach ($page->getPages() as $child): ?>
                                        <a class="dropdown-item" href="<?= $child->getHref() ?>">
                                            <?= ucwords(str_replace("-", " ", $child->getLabel())) ?>
                                        </a>
                                    <?php endforeach ?>
                                </div>
                            </li>
                        <?php endif ?>

                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
        <div class="d-inline-block ml-4">
            <?php if (!$this->get('session')->get('_token')): ?>
            <a href="" class="btn btn-sm btn-success">
                <i class="fa fa-sign-in"></i> Login
            </a>
            <?php else: ?>
            <a href="" class="btn btn-sm btn-primary mr-2">
                <i class="fa fa-person"></i> Profile
            </a>
            <a href="" class="btn btn-sm btn-warning">
                <i class="fa fa-sign-out"></i> Logout
            </a>
            <?php endif ?>
        </div>
    </div>
</nav>