<?php $page_title="Employment History";
  include_once $_SERVER['DOCUMENT_ROOT'] . "/web-assets/tpl/app-header.php";

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

$create_record = <<<CREATE
<form action="../../data.php?function=create" method="post">
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
      <option>It</option>
      <option>was</option>
      <option>too</option>
      <option>late</option>
      <option>at</option>
      <option>night</option>
      <option>to</option>
      <option>add</option>
      <option>every</option>
      <option>state.</option>
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
CREATE;

$edit_record = <<<EDIT
<form action="/../../data.php?function=edit&eid=$id" method="post">
  <div class="form-group">
    <label for="employer-name">Employer Name</label>
    <input type="text" class="form-control" id="employer-name" placeholder="Employer Name" name="e-name" value="$e_name">
  </div>
  <div class="form-group">
    <label for="employment-city">City</label>
    <input type="text" class="form-control" id="employment-city" placeholder="City" name="e-city" value="$e_city">
  </div>
  <div class="form-group">
    <label for="employment-state">State</label>
    <select class="form-control" id="employment-state" name="e-state">
      <option>It</option>
      <option>was</option>
      <option>too</option>
      <option>late</option>
      <option>at</option>
      <option>night</option>
      <option>to</option>
      <option>add</option>
      <option>every</option>
      <option>state.</option>
    </select>
  </div>
  <div class="form-group">
    <label for="start-date">Start Date</label>
    <input type="date" class="form-control" id="start-date" name="e-start-date" value="$e_start_date">
  </div>
  <div class="form-group">
    <label for="end-date">End Date</label>
    <input type="date" class="form-control" id="end-date" name="e-end-date" value="$e_end_date">
  </div>
  <div class="form-group">
    <label for="position">Position</label>
    <input type="text" class="form-control" id="position" placeholder="Position" name="e-position" value="$e_position">
  </div>
  <div class="form-group">
    <label for="job-description">Job Description</label>
    <input type="textarea" class="form-control" id="job-description" name="e-description" value="$e_description">
  </div>
  <div class="form-group">
    <label for="phone-number">Phone Number</label>
    <input type="tel" class="form-control" id="phone-number" placeholder="###-###-####" name="e-phone" value="$e_phone">
  </div>
  <div class="form-group">
    <input type="submit" class="form-control">
  </div>
</form>
EDIT;

if (isset($_REQUEST['edit']) && ($_REQUEST['edit']) == "edit") {
  echo $edit_record;
} else {
  echo $create_record;
}
?>
