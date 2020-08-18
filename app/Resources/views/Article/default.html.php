<?= $this->extend('Base/layout.html.php') ?>

<?php
$widget_list = [];
if ($widget = \Pimcore\Model\WebsiteSetting::getByName('widget_article')) {
    $list = $widget->getData();
    if (!empty($list)) {
        foreach ($list->getWidgetList() as $w) {
            $widget_list[] = $w->getWidgetID();
        }
    }
}
?>

<div class="row justify-content-between">
    <div class="col-lg-8">
        <?= $this->areablock("content", [
            'allowed' => $widget_list
        ]); ?>
    </div>
    <div class="col-lg-4 pl-5">
        <h3>Categories</h3>
        <ul class="nav flex-column">
            <?php foreach ($categories as $category): ?>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= $this->path('category_detail', [
                        'category' => $category->getSlug()
                    ]) ?>">
                        <i class="<?= $category->getIcon() ?> mr-2"></i>
                        <?= $category->getTitle() ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>