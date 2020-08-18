<div class="row justify-content-between">
	<div class="col-lg-4 text-left">
        <h3>Pimcore</h3>
    </div>
    <div class="col-lg-4">
        
    </div>
	<div class="col-lg-4 text-right">
    <?php while ($this->block("socmed")->loop()) { ?>
        <a href="<?= $this->input('link') ?>" class="btn btn-sm btn-light rounded-circle">
            <i class="fa <?= $this->input('icon') ?>"></i>
        </a>
    <?php } ?>    
    </div>
</div>
<hr>
<small class="copyright">&copy;2020 Pimcore.</small>