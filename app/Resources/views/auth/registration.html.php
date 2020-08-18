<?= $this->extend('Base/full-layout.html.php') ?>

<form class="form-signin" method="POST" action="/auth/register">
    <img class="mb-4" src="/theme/img/favicon.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

    <label for="inputFullname" class="sr-only">Full name</label>
    <input type="text" name="fullname" id="inputFullname" class="form-control" placeholder="Full name" style="border-radius: 0;" required>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" style="margin-top: -1px;" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>

    <div class="d-block my-3">
        <a href="/auth/login">Already have account? login here</a>
    </div>

    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>