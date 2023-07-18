<?php /** @var $this \shop\View */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo ADMIN ?>/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo PATH ?>/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo PATH ?>/admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

<?php echo $this->content ?>

<script src="<?php echo PATH ?>/admin/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo PATH ?>/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo PATH ?>/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
