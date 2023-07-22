<!-- Default box -->
<div class="card">

    <div class="card-body">

        <form action="" method="post">

            <div class="form-group">
                <label class="required" for="parent_id">Category</label>
                <?php new \app\widgets\menu\Menu([
                    'cache' => 0,
                    'cacheKey' => 'admin_menu_select',
                    'class' => 'form-control',
                    'container' => 'select',
                    'attrs' => [
                        'name' => 'parent_id',
                        'id' => 'parent_id',
                        'required' => 'required',
                    ],
                    'tpl' => APP . '/widgets/menu/admin_select_tpl.php',
                ]) ?>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="required" for="price">Price</label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="Price"
                               value="<?php echo $product[$lang]['price'] ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="old_price">Old Price</label>
                        <input type="text" name="old_price" class="form-control" id="old_price"
                               placeholder="Old Price" value="<?php echo $product[$lang]['old_price'] ?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="status"
                           name="status" <?php echo $product[$lang]['status'] ? 'checked' : '' ?>>
                    <label for="status" class="custom-control-label">Show on the site</label>
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="hit"
                           name="hit" <?php echo $product[$lang]['hit'] ? 'checked' : '' ?>>
                    <label for="hit" class="custom-control-label">Hit</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="form-group">
                        <label for="is_download">Attach downloadable file to make product <i>Digital</i></label>
                        <?php if (isset($product[$lang]['download_id'])): ?>
                            <p class="clear-download">
                                <span class="btn btn-danger">Regular product</span>
                            </p>
                        <?php endif; ?>
                        <select name="is_download" class="form-control select2 is-download" id="is_download" style="width: 100%;">
                            <?php if (isset($product[$lang]['download_id'])): ?>
                                <option value="<?php echo $product[$lang]['download_id'] ?>"
                                        selected><?php echo $product[$lang]['download_name'] ?></option>
                            <?php endif; ?>
                        </select>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Main photo</h3>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-success" id="add-base-img" onclick="popupBaseImage(); return false;">
                                Download
                            </button>
                            <div id="base-img-output" class="upload-images base-image">
                                <div class="product-img-upload">
                                    <img src="<?php echo $product[$lang]['img'] ?>">
                                    <input type="hidden" name="img" value="<?php echo $product[1]['img'] ?>">
                                    <?php if ($product[$lang]['img'] != NO_IMAGE): ?>
                                        <button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Additional photo</h3>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-success" id="add-gallery-img"
                                    onclick="popupGalleryImage(); return false;">Download
                            </button>
                            <div id="gallery-img-output" class="upload-images gallery-image">
                                <?php if (!empty($gallery)): ?>
                                    <?php foreach ($gallery as $item): ?>
                                        <div class="product-img-upload">
                                            <img src="<?php echo $item ?>">
                                            <input type="hidden" name="gallery[]"
                                                   value="<?php echo $item ?>">
                                            <button class="del-img btn btn-app bg-danger"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>


            <div class="card card-info card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <?php foreach (\shop\App::$app::getProperty('languages') as $k => $lang): ?>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($lang['base']) echo 'active' ?>" data-toggle="pill"
                                   href="#<?php echo $k ?>">
                                    <img src="<?php echo PATH ?>/assets/img/lang/<?php echo $k ?>.png" alt="">
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <?php foreach (\shop\App::$app::getProperty('languages') as $k => $lang): ?>
                            <div class="tab-pane fade <?php if ($lang['base']) echo 'active show' ?>" id="<?php echo $k ?>">

                                <div class="form-group">
                                    <label class="required" for="title">Name product</label>
                                    <input type="text" name="product_description[<?php echo $lang['id'] ?>][title]"
                                           class="form-control" id="title" placeholder="Name product"
                                           value="<?php echo htmlspecialchars($product[$lang['id']]['title'], ENT_QUOTES) ?>">
                                </div>

                                <div class="form-group">
                                    <label for="description">Meta-description</label>
                                    <input type="text" name="product_description[<?php echo $lang['id'] ?>][description]"
                                           class="form-control" id="description" placeholder="Meta-description page"
                                           value="<?php echo htmlspecialchars($product[$lang['id']]['description'], ENT_QUOTES) ?>">
                                </div>

                                <div class="form-group">
                                    <label for="keywords">Keywords</label>
                                    <input type="text" name="product_description[<?php echo $lang['id'] ?>][keywords]"
                                           class="form-control" id="keywords" placeholder="Keywords for SEO"
                                           value="<?php echo htmlspecialchars($product[$lang['id']]['keywords'], ENT_QUOTES) ?>">
                                </div>

                                <div class="form-group">
                                    <label for="excerpt" class="required">Short description</label>
                                    <input type="text" name="product_description[<?php echo $lang['id'] ?>][excerpt]"
                                           class="form-control" id="excerpt" placeholder="Short description product"
                                           value="<?php echo htmlspecialchars($product[$lang['id']]['excerpt'], ENT_QUOTES) ?>">
                                </div>

                                <div class="form-group">
                                    <label for="content" class="required">Description</label>
                                    <textarea name="product_description[<?php echo $lang['id'] ?>][content]"
                                              class="form-control editor" id="content" rows="3"
                                              placeholder="Description product"><?php echo htmlspecialchars($product[$lang['id']]['content'], ENT_QUOTES) ?></textarea>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- /.card -->
            </div>

            <button type="submit" class="btn btn-primary">Save</button>

        </form>

    </div>

</div>
<!-- /.card -->

<script>
    function popupBaseImage() {
        CKFinder.popup({
            chooseFiles: true,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files.first();
                    const baseImgOutput = document.getElementById('base-img-output');
                    baseImgOutput.innerHTML = '<div class="product-img-upload"><img src="' + file.getUrl() + '"><input type="hidden" name="img" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                });
                finder.on('file:choose:resizedImage', function (evt) {
                    const baseImgOutput = document.getElementById('base-img-output');
                    baseImgOutput.innerHTML = '<div class="product-img-upload"><img src="' + evt.data.resizedUrl + '"><input type="hidden" name="img" value="' + evt.data.resizedUrl + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                });
            }
        });
    }
</script>

<script>
    function popupGalleryImage() {
        CKFinder.popup({
            chooseFiles: true,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files.first();
                    const galleryImgOutput = document.getElementById('gallery-img-output');

                    if (galleryImgOutput.innerHTML) {
                        galleryImgOutput.innerHTML += '<div class="product-img-upload"><img src="' + file.getUrl() + '"><input type="hidden" name="gallery[]" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                    } else {
                        galleryImgOutput.innerHTML = '<div class="product-img-upload"><img src="' + file.getUrl() + '"><input type="hidden" name="gallery[]" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                    }

                });
                finder.on('file:choose:resizedImage', function (evt) {
                    const baseImgOutput = document.getElementById('base-img-output');

                    if (galleryImgOutput.innerHTML) {
                        galleryImgOutput.innerHTML += '<div class="product-img-upload"><img src="' + file.getUrl() + '"><input type="hidden" name="gallery[]" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                    } else {
                        galleryImgOutput.innerHTML = '<div class="product-img-upload"><img src="' + file.getUrl() + '"><input type="hidden" name="gallery[]" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                    }

                });
            }
        });
    }
</script>

<script>
    window.editors = {};
    document.querySelectorAll('.editor').forEach((node, index) => {
        ClassicEditor
            .create(node, {
                ckfinder: {
                    uploadUrl: '<?php echo PATH ?>/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                },
                toolbar: ['ckfinder', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo', '|', 'link', 'bulletedList', 'numberedList', 'insertTable', 'blockQuote'],
                image: {
                    toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight'],
                    styles: [
                        'alignLeft',
                        'alignCenter',
                        'alignRight'
                    ]
                }
            })
            .then(newEditor => {
                window.editors[index] = newEditor
            })
            .catch(error => {
                console.error(error);
            });
    });

</script>

