<div class="row">
    <?php foreach ($article_list as $article): ?>
        <div class="col-lg-4">
            <div class="card mb-4" style="min-height: 300px; max-height: 300px;">
                <img class="card-img-top" src="<?= $article->getBanner() ?>" alt="Card image cap">
                <div class="card-body">
                    <a href="<?= $this->path('articles_detail', [
                        'category' => $article->getCategory()->getSlug(),
                        'slug' => $article->getSlug()
                    ]) ?>">
                        <h5 class="card-title"><?= $article->getTitle() ?></h5>
                    </a>
                    <p><?= substr($article->getContent(), 0, 100).'...' ?></p>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>