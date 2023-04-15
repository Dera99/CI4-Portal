<div class="container">
    <div class="row text-dark mt-4">
        <?php foreach ($posts as $post) : ?>
            <div class="col-sm-4 g-4">
                <div class="card">
                    <div class="card-body">
                        <?php if (!empty($post->images)) { ?>
                            <img src="<?= base_url('uploads/posts/' . $post->images); ?>" class="card-img-top" alt="...">
                        <?php } ?>
                        <h5 class="card-title pt-2"><?= $post->title; ?></h5>
                        <p class="card-text"><?= $post->description; ?></p>
                        <div class="card-body d-flex justify-content-end">
                            <p class="pe-2">Author :</p><a href="#" class="card-link"><?= $post->author; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>