<?= $this->extend('layout.html.php') ?>
<?php  ?>

<section class="my-4" id="content">
    <div class="container py-4">
        <h3 class="card-title"><?= $article->getTitle() ?></h3>
        <picture>
            <img src="<?= $article->getBanner() ?>" class="img-fluid" alt="">
        </picture>
        <p><?= $article->getContent() ?></p>
    </div>
</section>