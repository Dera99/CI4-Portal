<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container col-4">
    <div class="row mt-4 justify-content-center align-items-center bg-light text-dark pt-4 rounded">
        <h2 class="text-center">Register</h2>
        <?php if (isset($message) && !empty($message)) : ?>
            <div class="alert alert-danger text-center" role="alert">
                <?= $message; ?>
            </div>
        <?php endif; ?>
        <div class="col-md-10 pt-4 mb-4">
            <form method="post" action="/user/register/save">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="fullname" class="form-label">Fullname</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="ms-2" href="/login">Already have an account ?</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>