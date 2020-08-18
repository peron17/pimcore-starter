<h2>Social Media</h2>
<?php $no = 1;?>
<?php while($this->block("socmed")->loop()) { ?>
    <h4>Icon <?= $no; ?></h4>
	<?= $this->input('icon') ?>
	<h4>Link <?= $no; ?></h4>
	<?= $this->input('link') ?>
	
    <?php $no++; ?>
<?php } ?>