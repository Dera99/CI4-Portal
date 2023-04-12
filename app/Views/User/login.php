<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container col-4">
    <div class="row mt-4 justify-content-center align-items-center bg-light text-dark pt-4 rounded">
        <h2 class="text-center">Login</h2>
        <?php if (isset($message) && !empty($message)) : ?>
            <div class="alert alert-success text-center" role="alert">
                <?= $message; ?>
            </div>
        <?php endif; ?>
        <div class="col-md-10 pt-4 mb-4">
            <form method="post" action="/user/login/auth">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="ms-3" href="/user/request-password">Forgot Password ?</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>