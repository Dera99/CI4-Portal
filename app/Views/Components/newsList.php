<div class="container">
    <div class="row text-dark mt-4">
        <?php foreach ($posts as $post) : ?>
            <div class="col-sm-4 g-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post->title; ?></h5>
                        <p class="card-text"><?= $post->description; ?></p>
                        <div class="card-body d-flex justify-content-end">
                            <a href="#" class="card-link"><?= $post->author; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>