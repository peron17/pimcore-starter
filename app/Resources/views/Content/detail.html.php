<?= $this->extend('layout.html.php') ?>

<?= $this->headTitle('Detail') ?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"><?= $this->input("jumbotron_header") ?></h1>
        <p class="lead text-muted"><?= $this->wysiwyg("jumbotron_content") ?></p>

        <?php if ($this->editmode) : ?>
            <div class="alert alert-primary">
                <p>You are entering edit mode. have fun!</p>
            </div>
        <?php endif ?>
    </div>
</section>