<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container col-4">
    <div class="row mt-4 justify-content-center align-items-center bg-light text-dark pt-4 rounded">
        <h2 class="text-center">Reset Password</h2>
        <?php if (isset($message) && !empty($message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $message; ?>
            </div>
        <?php endif; ?>
        <div class="col-md-10 pt-4 mb-4">
            <?= form_open("/user/recovery/reset") ?>
            <?= csrf_field(); ?>
            <input type="hidden" class="form-control" name="email" id="email" value="<?= $email; ?>">
            <input type="hidden" class="form-control" name="token" id="token" value="<?= $token; ?>">
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control <?= validation_show_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" value="<?= old('password') ?>" autofocus>
                <div class="invalid-feedback">
                    <?= validation_show_error('password') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Confirm Password</label>
                <input type="password" class="form-control <?= validation_show_error('password2') ? 'is-invalid' : '' ?>" id="password2" name="password2" value="<?= old('confirm password') ?>">
                <div class="invalid-feedback">
                    <?= validation_show_error('password2') ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>