<?php /** @var $products array */ ?>
<?php /** @var $this View */ ?>

<?php if (!empty($slides)): ?>
    <div class="container-fluid my-carousel">

    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
            <?php for ($i = 0; $i < count($slides); $i++): ?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i; ?>" <?php if ($i == 0) {echo 'class="active"';} ?> aria-current="true" aria-label="Slide <?php echo $i; ?>"></button>
            <?php endfor; ?>
        </div>
        <div class="carousel-inner">
            <?php $i = 1; foreach ($slides as $slide): ?>
            <div class="carousel-item <?php if ($i == 1) {echo 'active';} ?>">
                <img src="<?php echo PATH . $slide->img; ?>" class="d-block w-100" alt="">
            </div>
            <?php $i++; endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<?php endif; ?>
<?php if (!empty($products)): ?>
<section class="featured-products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="section-title"><?php __('main_index_featured_products'); ?></h3>
            </div>

            <?php $this->getPart('parts/products', compact('products')); ?>

        </div>
    </div>
</section>
<?php endif; ?>
<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="section-title"><?php __('tpl_footer_our_advantages'); ?></h3>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="service-item">
                    <p class="text-center"><i class="fas fa-shipping-fast"></i></p>
                    <p><?php __('tpl_footer_direct_deliveries'); ?></p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="service-item">
                    <p class="text-center"><i class="fas fa-cubes"></i></p>
                    <p><?php __('tpl_footer_wide_range_of_goods'); ?></p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="service-item">
                    <p class="text-center"><i class="fas fa-hand-holding-usd"></i></p>
                    <p><?php __('tpl_footer_pleasant_and_competitive_prices'); ?></p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="service-item">
                    <p class="text-center"><i class="fas fa-user-cog"></i></p>
                    <p><?php __('tpl_footer_professional_consultation_and_service'); ?></p>
                </div>
            </div>

        </div>
    </div>
</section>
