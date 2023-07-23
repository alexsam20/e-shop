<!-- Default box -->
<div class="card">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>ID</td>
                    <td><?php echo $user['id'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $user['email'] ?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo $user['name'] ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo $user['address'] ?></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td><?php echo $user['role'] == 'user' ? 'Пользователь' : 'Администратор' ?></td>
                </tr>
                </tbody>
            </table>
            <a href="<?php echo ADMIN ?>/user/edit?id=<?php echo $user['id'] ?>" class="btn btn-flat btn-secondary">Edit profile</a>
        </div>
    </div>

    <div class="card-body">
        <?php if (!empty($orders)): ?>
            <h3>User orders</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID order</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Modify</th>
                        <th>Sum</th>
                        <td width="50"><i class="fas fa-pencil-alt"></i></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr <?php if ($order['status']) echo 'class="table-info"' ?>>
                            <td><?php echo $order['id'] ?></td>
                            <td>
                                <?php echo $order['status'] ? 'Завершен' : 'Новый' ?>
                            </td>
                            <td><?php echo $order['created_at'] ?></td>
                            <td><?php echo $order['updated_at'] ?></td>
                            <td>$ <?php echo $order['total'] ?></td>
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
            <p>The User has not made any orders yet...</p>
        <?php endif; ?>

    </div>
</div>
<!-- /.card -->

