<!-- Default box -->
<div class="card">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table text-start table-bordered">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Sum</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($order as $item): ?>
                    <tr>
                        <td><a href="product/<?php echo $item['slug'] ?>"><?php echo $item['title'] ?></a></td>
                        <td>$<?php echo $item['price'] ?></td>
                        <td><?php echo $item['qty'] ?></td>
                        <td>$<?php echo $item['sum'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="box">
            <h3 class="box-title">Order details</h3>
            <div class="box-content">
                <div class="table-responsive">
                    <table class="table text-start table-striped">
                        <tr>
                            <td>Number order</td>
                            <td><?php echo $order[0]['order_id'] ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td><?php echo $order[0]['status'] ? 'Завершен' : 'Новый' ?></td>
                        </tr>
                        <tr>
                            <td>Created</td>
                            <td><?php echo $order[0]['created_at'] ?></td>
                        </tr>
                        <tr>
                            <td>Modify</td>
                            <td><?php echo $order[0]['updated_at'] ?></td>
                        </tr>
                        <tr>
                            <td>Total sum</td>
                            <td>$<?php echo $order[0]['total'] ?></td>
                        </tr>
                        <tr>
                            <td>Note</td>
                            <td><?php echo $order[0]['note'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>

        <?php if (!$order[0]['status']): ?>
            <a href="<?php echo ADMIN ?>/order/edit?id=<?php echo $order[0]['order_id'] ?>&status=1" class="btn btn-success btn-flat">Change status to Completed</a>
        <?php else: ?>
            <a href="<?php echo ADMIN ?>/order/edit?id=<?php echo $order[0]['order_id'] ?>&status=0" class="btn btn-danger btn-flat">Change status to new</a>
        <?php endif; ?>

    </div>
</div>
<!-- /.card -->

