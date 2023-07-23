<!-- Default box -->
<div class="card">

    <div class="card-body">
        <?php if (!empty($orders)): ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID order</th>
                        <th>Ststus</th>
                        <th>Create</th>
                        <th>Changed</th>
                        <th>Sum</th>
                        <td width="50"><i class="fas fa-pencil-alt"></i></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr <?php if ($order['status']) echo 'class="table-info"' ?>>
                            <td><?php echo $order['id'] ?></td>
                            <td>
                                <?php echo $order['status'] ? 'Completed' : 'New' ?>
                            </td>
                            <td><?php echo $order['created_at'] ?></td>
                            <td><?php echo $order['updated_at'] ?></td>
                            <td>$<?php echo $order['total'] ?></td>
                            <td width="50">
                                <a class="btn btn-info btn-sm" href="<?php echo ADMIN ?>/order/edit?id=<?php echo $order['id'] ?>">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p><?php echo count($orders) ?> order(s) from: <?php echo $total; ?></p>
                    <?php if ($pagination->countPages > 1): ?>
                        <?php echo $pagination; ?>
                    <?php endif; ?>
                </div>
            </div>

        <?php else: ?>
            <p>Orders not Found...</p>
        <?php endif; ?>

    </div>
</div>
<!-- /.card -->

