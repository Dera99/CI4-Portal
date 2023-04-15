<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row text-dark d-flex justify-content-center">
        <div class="col-sm-4 g-4">
            <h1 class="text-white">Posting Sesuatu !</h1>
            <?php if (isset($message) && !empty($message)) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post" enctype="multipart/form-data" action="/user/dashboard">
                <?= csrf_field(); ?>
                <div class="text-white">
                    <input type="hidden" class="form-control" name="email" value="<?= $email; ?>" />
                    <div class="form-group mb-3">
                        <label for="title">Title <span class="require">*</span></label>
                        <input type="text" class="form-control <?= validation_show_error('title') ? 'is-invalid' : '' ?>" name="title" />
                        <div class="invalid-feedback">
                            <?= validation_show_error('title') ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="picture" class="form-label">Add Picture</label>
                        <input type="file" name="picture" class="form-control <?= validation_show_error('picture') ? 'is-invalid' : '' ?>" accept=".jpg,.jpeg,.png,.webp">
                        <div class="invalid-feedback">
                            <?= validation_show_error('picture') ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea rows="5" class="form-control <?= validation_show_error('description') ? 'is-invalid' : '' ?>" name="description"></textarea>
                        <div class="invalid-feedback">
                            <?= validation_show_error('description') ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>