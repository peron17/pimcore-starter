<?= $this->extend('layout.html.php') ?>

<?= $this->headTitle('Content') ?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"><?= $this->input("jumbotron_header") ?></h1>
        <p class="lead text-muted"><?= $this->wysiwyg("jumbotron_content") ?></p>
        <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
        <p class="text-muted"><?= $var ?></p>

        <?php if ($this->editmode) : ?>
            <div class="alert alert-primary">
                <p>You are entering edit mode. have fun!</p>
            </div>
        <?php endif ?>
    </div>
</section>

<section class="mb-5">
    <div class="container">
        <?php 
        $widget_list = [];
        if ($widget = \Pimcore\Model\WebsiteSetting::getByName('widget_home')) {
            $list = $widget->getData();
            if(!empty($list)){
                foreach($list->getWidgetList() as $w){
                    $widget_list[] = $w->getWidgetID();
                }
            }
        }
        ?>

        <?= $this->areablock("content", [
            'allowed' => $widget_list
        ]); ?>
    </div>
</section>