<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row text-center mt-2">
        <div class="col">
            <h1>Register</h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>