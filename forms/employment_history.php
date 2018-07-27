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
    $e_id = $_REQUEST['id'];
    $sql = <<<SQL
      SELECT * FROM employment WHERE id = $e_id;
SQL;

    $result = $dbh->query($sql);
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

    echo "<form action='/job_app/index.php?action=editemphistory&id=$e_id' method='post'>";
  } else {
    echo "<form action='/job_app/index.php?action=createemphistory' method='post'>";
  }

function selected($state) {
  global $e_state;

  if ($state == $e_state) {
    echo "selected";
  }
}

?>

  <div class="form-group">
    <label for="employer-name">Employer Name</label>
    <input type="text" class="form-control" id="employer-name" placeholder="Employer Name" name="e-name" value="<?php echo $e_name ?>">
  </div>
  <div class="form-group">
    <label for="employment-city">City</label>
    <input type="text" class="form-control" id="employment-city" placeholder="City" name="e-city" value="<?php echo $e_city ?>">
  </div>
  <div class="form-group">
    <label for="employment-state">State</label>
    <select class="form-control" id="employment-state" name="e-state">
      <option value="Alabama" <?php selected("Alabama") ?>>Alabama</option>
      <option value="Alaska" <?php selected("Alaska") ?>>Alaska</option>
      <option value="Arkansas" <?php selected("Arkansas") ?>>Arkansas</option>
      <option value="Conneticut" <?php selected("Conneticut") ?>>Conneticut</option>
      <option value="Delaware" <?php selected("Delaware") ?>>Delaware</option>
      <option value="Florida" <?php selected("Florida") ?>>Florida</option>
      <option value="Georgia" <?php selected("Georgia") ?>>Georgia</option>
      <option value="Idaho" <?php selected("Idaho") ?>>Idaho</option>
      <option value="Illinois" <?php selected("Illinois") ?>>Illinois</option>
      <option value="Indiana" <?php selected("Indiana") ?>>Indiana</option>
    </select>
  </div>
  <div class="form-group">
    <label for="start-date">Start Date</label>
    <input type="date" class="form-control" id="start-date" name="e-start-date" value="<?php echo $e_start_date ?>">
  </div>
  <div class="form-group">
    <label for="end-date">End Date</label>
    <input type="date" class="form-control" id="end-date" name="e-end-date" value="<?php echo $e_end_date ?>">
  </div>
  <div class="form-group">
    <label for="position">Position</label>
    <input type="text" class="form-control" id="position" placeholder="Position" name="e-position" value="<?php echo $e_position ?>">
  </div>
  <div class="form-group">
    <label for="job-description">Job Description</label>
    <input type="textarea" class="form-control" id="job-description" name="e-description" value="<?php echo $e_description ?>">
  </div>
  <div class="form-group">
    <label for="phone-number">Phone Number</label>
    <input type="tel" class="form-control" id="phone-number" placeholder="###-###-####" name="e-phone" value="<?php echo $e_phone ?>">
  </div>
  <div class="form-group">
    <input type="submit" class="form-control">
  </div>
</form>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/job_app/web-assets/tpl/app_footer.php';
?>
