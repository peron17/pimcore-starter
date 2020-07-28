<?php 
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */

use Pimcore\Model\Document;

$document = $this->document; 
if(!$document instanceof \Pimcore\Model\Document\Page) {
    $document = \Pimcore\Model\Document\Page::getById(1);
}

// get the document which should be used to start in navigation | default home
$mainNavStartNode = $this->document->getProperty("navigationRoot");
if(!$mainNavStartNode instanceof \Pimcore\Model\Document\Page) {
    $mainNavStartNode = \Pimcore\Model\Document\Page::getById(1);
}

// this returns us the navigation container we can use to render the navigation
$mainNavigation = $this->navigation()->build(['active' => $document, 'root' => $mainNavStartNode]);
?>

<!doctype html>
<html lang="en">

<head>
    <?php $this->headMeta()->appendName('description', 'This is my first pimcore landing page') ?>
    <?php $this->headMeta()->appendName('author', 'Tommy Priambodo') ?>
    <?php $this->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8') ?>
    <?php $this->headMeta()->appendName('viewport', 'width=device-width, initial-scale=1.0') ?>
    <?= $this->headMeta() ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <?php $this->headLink()->appendStylesheet('/theme/css/bootstrap.min.css') ?>
    <?php $this->headLink()->appendStylesheet('/theme/css/custom.css') ?>
    <?php $this->headLink(['rel' => 'icon', 'href' => '/theme/img/favicon.png'], 'PREPEND') ?>
    <?= $this->headLink() ?>
</head>

<body>

    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Twitter</a></li>
                            <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="#" class="text-white">Email me</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="/" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                        <circle cx="12" cy="13" r="4"></circle>
                    </svg>
                    <strong>Album</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        
        <?= $this->navigation()->menu()->renderPartial($mainNavigation, 'navigation.html.php') ?>
    </header>

    <main role="main">
        <?php $this->slots()->output('_content') ?>
    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.7/holder.js" integrity="sha512-uhp2Ee4MNexF4HNrWF5Vo82DIq6bvfdEcDJEqOAVy7q2h2I4HsZTFgfEoHt7+j/Ez2cEeJ0yyrZZxcGeY9aT+A==" crossorigin="anonymous"></script>

    <?php $this->headScript()->appendFile('/theme/js/bootstrap.min.js') ?>
    <?= $this->headScript() ?>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
</body>

</html>