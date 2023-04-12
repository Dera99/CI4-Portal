<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Berita Hari Ini</h2>
            <?= $this->include('components/news'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>