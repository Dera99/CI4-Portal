<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container col-4">
    <div class="row mt-4 justify-content-center align-items-center bg-light text-dark pt-4 rounded">
        <h2 class="text-center">Recovery Password</h2>
        <div class="col-md-10 pt-4 mb-4">
            <form>
                <div class="mb-3">
                    <label for="otp" class="form-label">Kode OTP</label>
                    <input type="text" class="form-control" name="otp" id="otp" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>