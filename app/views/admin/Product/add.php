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
                        <input type="text" name="price" class="form-control" id="price" placeholder="Price" value="<?php echo getFieldValue('price') ?: 0 ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="old_price">Old price</label>
                        <input type="text" name="old_price" class="form-control" id="old_price" placeholder="Old price" value="<?php echo getFieldValue('old_price') ?: 0 ?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="status" name="status" checked>
                    <label for="status" class="custom-control-label">View</label>
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="hit" name="hit">
                    <label for="hit" class="custom-control-label">Hit</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group"><!-- Прикрепите загружаемый файл, чтобы товар стал цифровым -->
                        <label for="is_download">Attach downloadable file to make product <i>Digital</i></label>
                        <select name="is_download" class="form-control select2 is-download" id="is_download" style="width: 100%;"></select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Main Photo</h3>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-success" id="add-base-img" onclick="popupBaseImage(); return false;">Download</button>
                            <div id="base-img-output" class="upload-images base-image"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Additional Photo</h3>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-success" id="add-gallery-img" onclick="popupGalleryImage(); return false;">Download</button>
                            <div id="gallery-img-output" class="upload-images gallery-image"></div>
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
                                <a class="nav-link <?php if ($lang['base']) echo 'active' ?>" data-toggle="pill" href="#<?php echo $k ?>">
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
                                    <label class="required" for="title">Name</label>
                                    <input type="text" name="product_description[<?php echo $lang['id'] ?>][title]" class="form-control" id="title" placeholder="Name product" value="<?php echo getFieldArrayValue('product_description', $lang['id'], 'title') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="description">Meta-description</label>
                                    <input type="text" name="product_description[<?php echo $lang['id'] ?>][description]" class="form-control" id="description" placeholder="Meta-description page" value="<?php echo getFieldArrayValue('product_description', $lang['id'], 'description') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="keywords">Keywords</label>
                                    <input type="text" name="product_description[<?php echo $lang['id'] ?>][keywords]" class="form-control" id="keywords" placeholder="Keywords for SEO" value="<?php echo getFieldArrayValue('product_description', $lang['id'], 'keywords') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exerpt" class="required">Short description</label>
                                    <input type="text" name="product_description[<?php echo $lang['id'] ?>][excerpt]" class="form-control" id="exerpt" placeholder="Short description product" value="<?php echo getFieldArrayValue('product_description', $lang['id'], 'exerpt') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="content" class="required">Description</label>
                                    <textarea name="product_description[<?php echo $lang['id'] ?>][content]" class="form-control editor" id="content" rows="3" placeholder="Description product"><?php echo getFieldArrayValue('product_description', $lang['id'], 'content') ?></textarea>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- /.card -->
            </div>

            <button type="submit" class="btn btn-primary">Save</button>

        </form>

        <?php
        if (isset($_SESSION['form_data'])) {
            unset($_SESSION['form_data']);
        }
        ?>

    </div>

</div>
<!-- /.card -->

<script>
    function popupBaseImage() {
        CKFinder.popup( {
            chooseFiles: true,
            language: 'en',
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    const baseImgOutput = document.getElementById( 'base-img-output' );
                    baseImgOutput.innerHTML = '<div class="product-img-upload"><img src="' + file.getUrl() + '"><input type="hidden" name="img" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                } );
                finder.on( 'file:choose:resizedImage', function( evt ) {
                    const baseImgOutput = document.getElementById( 'base-img-output' );
                    baseImgOutput.innerHTML = '<div class="product-img-upload"><img src="' + evt.data.resizedUrl + '"><input type="hidden" name="img" value="' + evt.data.resizedUrl + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                } );
            }
        } );
    }
</script>

<script>
    function popupGalleryImage() {
        CKFinder.popup( {
            chooseFiles: true,
            language: 'en',
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    const galleryImgOutput = document.getElementById( 'gallery-img-output' );

                    if (galleryImgOutput.innerHTML) {
                        galleryImgOutput.innerHTML += '<div class="product-img-upload"><img src="' + file.getUrl() + '"><input type="hidden" name="gallery[]" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                    } else {
                        galleryImgOutput.innerHTML = '<div class="product-img-upload"><img src="' + file.getUrl() + '"><input type="hidden" name="gallery[]" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                    }

                } );
                finder.on( 'file:choose:resizedImage', function( evt ) {
                    const baseImgOutput = document.getElementById( 'base-img-output' );

                    if (galleryImgOutput.innerHTML) {
                        galleryImgOutput.innerHTML += '<div class="product-img-upload"><img src="' + file.getUrl() + '"><input type="hidden" name="gallery[]" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                    } else {
                        galleryImgOutput.innerHTML = '<div class="product-img-upload"><img src="' + file.getUrl() + '"><input type="hidden" name="gallery[]" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                    }

                } );
            }
        } );
    }
</script>

<script>
    window.editors = {};
    document.querySelectorAll( '.editor' ).forEach( ( node, index ) => {
        ClassicEditor
            .create( node, {
                ckfinder: {
                    uploadUrl: '<?php echo PATH ?>/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                },
                toolbar: [ 'ckfinder', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo', '|', 'link', 'bulletedList', 'numberedList', 'insertTable', 'blockQuote' ],
                image: {
                    toolbar: [ 'imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight' ],
                    styles: [
                        'alignLeft',
                        'alignCenter',
                        'alignRight'
                    ]
                }
            } )
            .then( newEditor => {
                window.editors[ index ] = newEditor
            } )
            .catch( error => {
                console.error( error );
            } );
    });

</script>
