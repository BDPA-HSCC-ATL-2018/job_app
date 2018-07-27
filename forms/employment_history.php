<?php $page_title="Employment History";
  include_once $_SERVER['DOCUMENT_ROOT'] . "/job_app/web-assets/tpl/app_header.php";

  $id = "";
  $e_name = "";
  $e_phone = "";
  $e_city = "";
  $e_state = "";
  $e_start_date = "";
  $e_end_date = "";
  $e_position = "";
  $e_description = "";

  if (isset($_REQUEST['edit']) && ($_REQUEST['edit']) == "edit") {
    $id = $_REQUEST['id'];
    $sql = <<<SQL
    SELECT * FROM employment WHERE id="$id";
SQL;

    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
      $e_name = $row['e_name'];
      $e_phone = $row['e_phone'];
      $e_city = $row['e_city'];
      $e_state = $row['e_state'];
      $e_start_date = $row['e_start_date'];
      $e_end_date = $row['e_end_date'];
      $e_position = $row['e_position'];
      $e_description = $row['e_description'];
    }
  }

?>

<form action="/job_app/index.php?action=createemphistory" method="post">
  <div class="form-group">
    <label for="employer-name">Employer Name</label>
    <input type="text" class="form-control" id="employer-name" placeholder="Employer Name" name="e-name">
  </div>
  <div class="form-group">
    <label for="employment-city">City</label>
    <input type="text" class="form-control" id="employment-city" placeholder="City" name="e-city">
  </div>
  <div class="form-group">
    <label for="employment-state">State</label>
    <select class="form-control" id="employment-state" name="e-state">
      <option value="Alabame">Alabama</option>
      <option value="Alaska">Alaska</option>
      <option value="Arkansas">Arkansas</option>
      <option value="Conneticut">Conneticut</option>
      <option value="Delaware">Delaware</option>
      <option value="Florida">Florida</option>
      <option value="Georgia">Georgia</option>
      <option value="Idaho">Idaho</option>
      <option value="Illinois">Illinois</option>
      <option value="Indiana">Indiana</option>
    </select>
  </div>
  <div class="form-group">
    <label for="start-date">Start Date</label>
    <input type="date" class="form-control" id="start-date" name="e-start-date">
  </div>
  <div class="form-group">
    <label for="end-date">End Date</label>
    <input type="date" class="form-control" id="end-date" name="e-end-date">
  </div>
  <div class="form-group">
    <label for="position">Position</label>
    <input type="text" class="form-control" id="position" placeholder="Position" name="e-position">
  </div>
  <div class="form-group">
    <label for="job-description">Job Description</label>
    <input type="textarea" class="form-control" id="job-description" name="e-description">
  </div>
  <div class="form-group">
    <label for="phone-number">Phone Number</label>
    <input type="tel" class="form-control" id="phone-number" placeholder="###-###-####" name="e-phone">
  </div>
  <div class="form-group">
    <input type="submit" class="form-control">
  </div>
</form>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/job_app/web-assets/tpl/app_footer.php';
?>
