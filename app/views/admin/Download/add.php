<!-- Default box -->
<div class="card">

    <div class="card-body">

        <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">

            <?php foreach (\shop\App::$app::getProperty('languages') as $k => $lang): ?>

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label required">
                        <img src="<?php echo PATH ?>/assets/img/lang/<?php echo $k; ?>.png" alt="">
                        Name
                    </label>
                    <div class="col-sm-9">
                        <input type="text" name="download_description[<?php echo $lang['id'] ?>][name]" class="form-control" id="name" placeholder="File name">
                    </div>

                </div>

            <?php endforeach; ?>

            <hr>

            <span class="text-info">Allowed extensions to be loaded: jpg, jpeg, png, zip, pdf, txt</span>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input required" id="exampleInputFile" required2>
                    <label class="custom-file-label required" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                </div>
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Save</button>


        </form>

    </div>

</div>
<!-- /.card -->
