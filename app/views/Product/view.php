<?php /** @var $product array */ ?>
<?php /** @var $breadcrumbs \app\models\Breadcrumbs */ ?>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2">
            <?php echo $breadcrumbs; ?>
        </ol>
    </nav>
</div>


<div class="container py-3">
    <div class="row">

        <div class="col-md-4 order-md-2">

            <h1><?php echo $product['title']; ?></h1>

            <ul class="list-unstyled">
                <?php if ($product['amount'] !== null): ?>
                    <li><i class="fas fa-check text-success"></i>&nbsp;&nbsp;<?php __('product_view_in_stock'); ?></li>
                <?php else: ?>
                    <li><i class="fas fa-shipping-fast text-muted"></i>&nbsp;&nbsp;<?php __('product_view_is_waiting'); ?></li>
                <?php endif; ?>
                <li><i class="fas fa-hand-holding-usd"></i> <span class="product-price">
                        <?php if ($product['old_price']): ?>
                        <small>$<?php echo $product['old_price']; ?></small>
                        <?php endif; ?>
                        $<?php echo $product['price']; ?>
                </li>
            </ul>

            <div id="product">
                <div class="input-group mb-3">
                    <input id="input-quantity" type="text" class="form-control" name="quantity" value="1">
                    <button class="btn btn-danger add-to-cart" type="button" data-id="<?php echo $product['id']; ?>"><?php __('product_view_buy'); ?></button>
                </div>
            </div>

        </div>

        <div class="col-md-8 order-md-1">

            <ul class="thumbnails list-unstyled clearfix">
                <li class="thumb-main text-center"><a class="thumbnail" href="<?php echo IMAGE . '/' . $product['img']; ?>" data-effect="mfp-zoom-in"><img src="<?php echo IMAGE . '/' . $product['img']; ?>" alt="<?php echo IMAGE . '/' . $product['title']; ?>"></a></li>
                <?php if (!empty($imgGallery)): ?>
                    <?php foreach ($imgGallery as $item): ?>
                        <li class="thumb-additional">
                            <a class="thumbnail" href="<?php echo PRODUCT_GALLERY . $item['img']; ?>" data-effect="mfp-zoom-in">
                                <img src="<?php echo PRODUCT_GALLERY . $item['img']; ?>" alt="">
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        <?php echo $product['content']; ?>
        </div>

    </div>
</div>

