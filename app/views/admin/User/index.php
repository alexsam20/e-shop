<!-- Default box -->
<div class="card">

    <div class="card-header">
        <a href="<?php echo ADMIN ?>/user/add" class="btn btn-default btn-flat"><i class="fas fa-plus"></i> Добавить пользователя</a>
    </div>

    <div class="card-body">

        <?php if (!empty($users)): ?>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th width="50"><i class="fas fa-eye"></i></th>
                    <th width="50"><i class="fas fa-pencil-alt"></i></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['role'] == 'user' ? 'User' : 'Administrator' ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="<?php echo ADMIN ?>/user/view?id=<?php echo $user['id'] ?>">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="<?php echo ADMIN ?>/user/edit?id=<?php echo $user['id'] ?>">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-12">
                    <p><?php echo count($users) ?> User(s) from: <?php echo $total; ?></p>
                    <?php if ($pagination->countPages > 1): ?>
                        <?php echo $pagination; ?>
                    <?php endif; ?>
                </div>
            </div>

        <?php else: ?>
            <p>Users not found...</p>
        <?php endif; ?>

    </div>
</div>
<!-- /.card -->

