<?= $this->extend('layout.html.php') ?>

<section class="my-4" id="content">
    <div class="container">
        <div class="row">
        <?php foreach ($articles as $article): ?>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <a href="<?= $this->path('articles_detail', [
                        'category' => $article->getCategory()->getSlug(),
                        'slug' => $article->getSlug()
                    ]) ?>">
                        <h3 class="card-title"><?= $article->getTitle() ?></h3>
                    </a>
                    <p><?= substr($article->getContent(), 0, 300).'...' ?></p>
                </div>
            </div>
        </div>
        <?php endforeach ?>
        </div>
    </div>
</section>