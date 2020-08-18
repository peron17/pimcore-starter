<?php $no = 1; ?>
<?php while ($this->block("points")->loop()) { ?>
  <h4>Image <?= $no; ?></h4>
  <?= $this->image('points', [
    "title" => "Drag your image here",
    'reload'      => false,
    'hidetext'    => true
  ])
  ?>
  <?php $no++; ?>
<?php } ?>

<hr>
<h4>Banner Slider</h4>
<?php
$no = 1;
while ($this->block('hero-banner-slider-block')->loop()) {
?>
  <h5>Dekstop Banner <?= $no ?></h5>
  <?= $this->image('hero-banner-slider-desktop', [
    'title' => 'Drag your image here',
    'thumbnail'   => 'hero-banner-slider-desktop-thumbnail',
    'uploadPath'  => '/banner-slider/desktop/',
    'reload'      => false,
    'hidetext'    => true
  ])
  ?>
  <h5>Mobile Banner <?= $no ?></h5>
  <?= $this->image('hero-banner-slider-mobile', [
    'title' => 'Drag your image here',
    'thumbnail'   => 'hero-banner-slider-mobile-thumbnail',
    'uploadPath'  => '/banner-slider/mobile/',
    'reload'      => false,
    'hidetext'    => true
  ])
  ?>
<?php
  $no++;
}
?>