<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h4>Berita Hari Ini</h4>
            <?= $this->include('components/news'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>