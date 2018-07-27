<?php $page_title="Education History";
include_once $_SERVER['DOCUMENT_ROOT'] . '/job_app/web-assets/tpl/app_header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/job_app/web-assets/tpl/app_nav.php';

$i_id = "";
$i_name = "";
$i_start_date = "";
$i_end_date = "";
$i_type = "";
$i_grad_date = "";

if (isset($_REQUEST['edit']) && ($_REQUEST['edit']) == "edit") {
  $i_id = $_REQUEST['iid'];
  $sql = <<<SQL
  SELECT * FROM education WHERE id=$i_id;
SQL;

  $result = $conn->query($sql);
  if ($row = $result->fetch_assoc()) {
    $i_name = $row['i_name'];
    $i_start_date = $row['i_start_date'];
    $i_end_date = $row['i_end_date'];
    $i_type = $row['i_type'];
    $i_grad_date = $row['i_grad_date'];
  }
}
?>

<form action="/job_app/index.php?action=createeduhistory" method="post">
  <div class="form-group">
    <label for="institution-name">Institution Name</label>
    <input type="text" placeholder="Institution Name" class="form-control" id="institution-name" name="i-name">
  </div>
  <div class="form-group">
    <label for="institution-type">Institution Type</label>
    <input id="institution-type" class="form-control" placeholder="Institution Type" type="text" name="i-type">
  </div>
  <div class="form-group">
    <label for="start-date">Start Date</label>
    <input type="date" id="start-date" class="form-control" name="i-start-date">
  </div>
  <div class="form-group">
    <label for="end-date">End Date</label>
    <input type="date" id="end-date" class="form-control" name="i-end-date">
  </div>
  <div class="form-group">
    <label for="graduation-date">Graduation Date</label>
    <input type="date" id="graduation-date" class="form-control" name="i-grad-date">
  </div>
  <div class="form-group">
    <input type="submit" class="form-control">
  </div>
</form>

<?php
  include $_SERVER['DOCUMENT_ROOT'] . "/job_app/web-assets/tpl/app_footer.php";
?>
