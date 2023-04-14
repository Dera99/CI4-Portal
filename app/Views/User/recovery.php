<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container col-4">
    <div class="row mt-4 justify-content-center align-items-center bg-light text-dark pt-4 rounded">
        <h2 class="text-center">Recovery Password</h2>
        <?php if (isset($message) && !empty($message)) : ?>
            <div class="alert alert-success text-center" role="alert">
                <?= $message; ?>
            </div>
        <?php endif; ?>
        <div class="col-md-10 pt-4 mb-4">
            <?= form_open('/user/recovery') ?>
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control mb-2 <?= validation_show_error('email') ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= old('email') ?>" autofocus>
                <div class=" invalid-feedback">
                    <?= validation_show_error('email') ?>
                </div>
                <button type="submit" class="btn btn-primary">Send OTP</button>
            </div>
            <?= form_close() ?>
            <?= form_open("/user/recovery/reset/$email") ?>
            <?= csrf_field(); ?>
            <input type="hidden" class="form-control" name="email" id="email" value="<?= $email; ?>">
            <div class="mb-3">
                <label for="token" class="form-label">Token</label>
                <input type="text" class="form-control  <?= validation_show_error('token') ? 'is-invalid' : '' ?>" name="token" id="token" value="<?= old('token') ?>">
                <div class=" invalid-feedback">
                    <?= validation_show_error('token') ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>