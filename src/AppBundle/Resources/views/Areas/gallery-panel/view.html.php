<div class="album py-5 bg-light">
    <div class="container">

        <div class="row">
            <?php if (!empty($gallery_list)) : ?>
                <?php foreach ($gallery_list as $list) : ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="<?= $list->getPhoto() ?>" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text"><?= $list->getDescription() ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
    </div>
</div>