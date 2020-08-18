<!doctype html>
<html lang="en">

<head>
    <?php $this->headMeta()->appendName('description', 'This is my first pimcore landing page') ?>
    <?php $this->headMeta()->appendName('author', 'Tommy Priambodo') ?>
    <?php $this->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8') ?>
    <?php $this->headMeta()->appendName('viewport', 'width=device-width, initial-scale=1.0') ?>
    <?= $this->headMeta() ?>

    <?php $this->headTitle()->append('Login | Pimcore') ?>
    <?= $this->headTitle() ?>

    <?php $this->headLink()->appendStylesheet('/theme/css/bootstrap.min.css') ?>
    <?php $this->headLink()->appendStylesheet('/theme/css/signin.css') ?>
    <?php $this->headLink(['rel' => 'icon', 'href' => '/theme/img/favicon.png'], 'PREPEND') ?>
    <?= $this->headLink() ?>
</head>

<body class="text-center">

    <?php $this->slots()->output('_content') ?>

</body>

</html>