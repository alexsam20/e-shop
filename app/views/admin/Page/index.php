<!-- Default box -->
<div class="card">

    <div class="card-header">
        <a href="<?php echo ADMIN ?>/page/add" class="btn btn-default btn-flat"><i class="fas fa-plus"></i> Add page</a>
    </div>

    <div class="card-body">

        <?php if (!empty($pages)): ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <td width="50"><i class="fas fa-pencil-alt"></i></td>
                        <td width="50"><i class="far fa-trash-alt"></i></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pages as $page): ?>
                        <tr>
                            <td><?php echo $page['id'] ?></td>
                            <td>
                                <?php echo $page['title'] ?>
                            </td>
                            <td width="50">
                                <a class="btn btn-info btn-sm"
                                   href="<?php echo ADMIN ?>/page/edit?id=<?php echo $page['id'] ?>"><i
                                        class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td width="50">
                                <a class="btn btn-danger btn-sm delete"
                                   href="<?php echo ADMIN ?>/page/delete?id=<?php echo $page['id'] ?>">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p><?php echo count($pages) ?> page(s) from: <?php echo $total; ?></p>
                    <?php if ($pagination->countPages > 1): ?>
                        <?php echo $pagination; ?>
                    <?php endif; ?>
                </div>
            </div>

        <?php else: ?>
            <p>Pages not found...</p>
        <?php endif; ?>

    </div>
</div>
<!-- /.card -->

