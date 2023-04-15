<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container col-4">
    <div class="row mt-4 justify-content-center align-items-center bg-light text-dark pt-4 rounded">
        <h2 class="text-center">Register</h2>
        <?php if (isset($message) && !empty($message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $message; ?>
            </div>
        <?php endif; ?>
        <div class="col-md-10 pt-4 mb-4">
            <form method="post" enctype="multipart/form-data" action="/user/register/save">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="fullname" class="form-label">Fullname</label>
                    <input type="text" class="form-control <?= validation_show_error('fullname') ? 'is-invalid' : '' ?>" name="fullname" id="fullname" value="<?= old('fullname') ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= validation_show_error('fullname') ?>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control <?= validation_show_error('email') ? 'is-invalid' : '' ?>" name="email" id="email" value="<?= old('email') ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('email') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="profile" class="form-label">Profile Picture</label>
                        <input type="file" name="profile" class="form-control <?= validation_show_error('email') ? 'is-invalid' : '' ?>" accept=".jpg,.jpeg,.png,.webp">
                        <div class="invalid-feedback">
                            <?= validation_show_error('profile') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control <?= validation_show_error('email') ? 'is-invalid' : '' ?>" name="password" id="password" value="<?= old('password') ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('password') ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                    <a class="ms-2" href="/user/login">Already have an account ?</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>