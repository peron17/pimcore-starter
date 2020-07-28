<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <?php if ($this->pages) : ?>
                    <?php foreach ($this->pages as $page) : ?>
                        <?php if (!$page->isVisible()) continue; ?>
                        <?php if (!$page->hasPages()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $page->getHref() ?>"><?= ucwords(str_replace("-", " ", $page->getLabel())) ?></a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= ucwords(str_replace("-", " ", $page->getLabel())) ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php foreach ($page->getPages() as $child): ?>
                                        <?php if (!$child->isVisible()) continue; ?>
                                        <a class="dropdown-item" href="<?= $child->getHref() ?>"><?= ucwords(str_replace("-", " ", $child->getLabel())) ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach ?>
                <?php else : ?>
                    <?= 'Link not found' ?>
                <?php endif ?>
            </ul>
        </div>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>