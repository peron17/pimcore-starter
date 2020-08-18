<div class="row">
    <?php while ($this->block("points")->loop()) { ?>
        <div class="col-md-3 text-center">
            <img src="<?= $this->image('points')->getThumbnail('default'); ?>" class="img-thumbnail">
        </div>
    <?php } ?>
</div>
<hr>
<section id="hero-banner" class="">
    <ul class="slidable-hero-banner">
        <?php
        while ($this->block('hero-banner-slider-block')->loop()) {

            $tags = '
                <img class="bg-imagebanner-desktop" src="/assets/rrr_images/homepage/hero-banner.png" alt="">
                <img class="bg-imagebanner-mobile" src="/assets/rrr_images/homepage/hero-banner-mobile.png" alt="">
            ';
            
            if (
                !$this->image('hero-banner-slider-desktop')->isEmpty() &&
                !$this->image('hero-banner-slider-mobile')->isEmpty()
            ) {
                $imgDesktop = $this->image('hero-banner-slider-desktop', [])
                    ->getThumbnail('hero-banner-slider-desktop-thumbnail')
                    ->getHtml([
                        'class' => 'bg-imagebanner-desktop'
                    ]);

                $imgMobile = $this->image('hero-banner-slider-mobile', [])
                    ->getThumbnail('hero-banner-slider-mobile-thumbnail')
                    ->getHtml([
                        'class' => 'bg-imagebanner-mobile'
                    ]);

                $tags = $imgDesktop . $imgMobile;
            }
        ?>
            <li class="banner-image">
                <?= $tags; ?>
            </li>
        <?php
        }
        ?>
    </ul>
</section>