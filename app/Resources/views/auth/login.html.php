<?= $this->extend('Base/full-layout.html.php') ?>

<?php 
$fm = $this->get('session')->getFlashes();
if ($fm['_fm']) {
    var_dump($fm['_fm'][0]);
}
?>
<form class="form-signin" method="POST" action="/auth/login">
    <img class="mb-4" src="/theme/img/favicon.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    <div class="d-block my-3">
        <a href="/auth/registration">Don't have account? register here</a>
    </div>

    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>