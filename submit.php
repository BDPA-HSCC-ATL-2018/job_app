<?php
  $page_title = "Thank You!";
  include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_nav.php';
?>

<div class= "container-fluid">
    <h1><?php echo $page_title ?></h1>
    <p>Your application has been submitted.</p>
    <a class="btn btn-lg btn-primary" href="applicant.php" role="button">Fill Out Another Application</a>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_footer.php'; ?>
