<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container col-4">
    <div class="row mt-4 justify-content-center align-items-center bg-light text-dark pt-4 rounded">
        <h2 class="text-center">Recovery Password</h2>
        <div class="col-md-10 pt-4 mb-4">
            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1">
                </div>
                <button type="submit" class="btn btn-primary" onclick="alert('Silahkan Check Kode OTP Di Database !'); window.location.href='/user/reset-password'">Send OTP</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>