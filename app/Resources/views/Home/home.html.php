<?= $this->extend('Base/layout.html.php') ?>

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