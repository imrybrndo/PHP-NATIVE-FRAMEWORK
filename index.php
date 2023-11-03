<?php
include 'loader.php';
$setTemplate = TRUE;
if (isset($_GET['halaman'])) {
  $halaman = $_GET['halaman'];
} else {
  $halaman = 'beranda';
}

ob_start();
$file = 'halaman/' . $halaman . '.php';
if (!file_exists($file)) {
  include 'halaman/error.php';
} else {
  include $file;
}

$content = ob_get_contents();
ob_clean();

if ($setTemplates == TRUE) {
  if ($session->get('logged') !== TRUE) {
    redirect(url('login'));
  }
?>

  <!DOCTYPE html>
  <html lang="en">
  <?php include 'layouts/head.php' ?>

  <body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
      <?php include 'layouts/header.php' ?>

      <?php include 'layouts/sidebar.php' ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= $title ?>
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">

          <?php echo $content ?>

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php include 'layouts/footer.php' ?>

      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>


    <?php include 'layouts/js.php' ?>
  </body>

  </html>

<?php
} else {
  echo $content;
} ?>