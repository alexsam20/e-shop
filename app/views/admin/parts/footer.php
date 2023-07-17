<?php /** @var $this \shop\View */ ?>
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
<div class="logs">
<?php $this->getDBLogs(); ?>
</div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
    const PATH = '<?php echo PATH; ?>';
    const ADMIN = '<?php echo ADMIN; ?>';
</script>
<!-- jQuery -->
<script src="<?php echo PATH ?>/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo PATH ?>/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo PATH ?>/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo PATH ?>/admin/dist/js/demo.js"></script>
<script src="<?php echo PATH ?>/admin/main.js"></script>
</body>
</html>