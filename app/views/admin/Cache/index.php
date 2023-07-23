<!-- Default box -->
<div class="card">

    <div class="card-body">


        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <td width="50"><i class="far fa-trash-alt"></i></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    Cache Category
                </td>
                <td>
                    Menu categories to site. Caching to 1 hour.
                </td>
                <td width="50">
                    <a class="btn btn-danger btn-sm delete"
                       href="<?php echo ADMIN ?>/cache/delete?cache=category">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    Cache Page
                </td>
                <td>
                    Menu pages in footer. Caching to 1 hour.
                </td>
                <td width="50">
                    <a class="btn btn-danger btn-sm delete"
                       href="<?php echo ADMIN ?>/cache/delete?cache=page">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
</div>
<!-- /.card -->
