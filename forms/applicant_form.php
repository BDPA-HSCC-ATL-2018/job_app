<!-- This website will have two different outputs depending on if the user is editing or not. There will be a REQUEST variable to see if the user is editing. -->

<?php $page_title = "Applicant Info";
  include_once $_SERVER['DOCUMENT_ROOT'] . "/job_app/web-assets/tpl/app_header.php";

  $first_name = "";
  $middle_name = "";
  $last_name = "";
  $email_id = "";
  $pri_phone = "";
  $ssn = "";
  $date_of_birth = "";
  $address_line_one = "";
  $city_name = "";
  $postal_cd = "";

  $edit_profile =<<<EDIT
    <form id="applicant" method="post" action="/job_app/index.php?action=edit" class="needs-validation" novalidate>
EDIT;

  $create_profile =<<<CREATE
    <form id="applicant" method="post" action="/job_app/index.php?action=create" class="needs-validation" novalidate>
CREATE;

  if (isset($_REQUEST['edit']) && ($_REQUEST['edit']) == 'edit') {
    $email_id = $_SESSION['email_id'];

    $edit_profile_sql = <<<EDITPROF
      SELECT * FROM applicants WHERE email_id = "$email_id";
EDITPROF;

    $edit_profile_result = $dbh->query($edit_profile_sql);

    while ($edit_profile_row = $edit_profile_result->fetch_assoc()) {
      $first_name = $edit_profile_row['first_name'];
      $middle_name = $edit_profile_row['middle_name'];
      $last_name = $edit_profile_row['last_name'];
      $email_id = $edit_profile_row['email_id'];
      $pri_phone = $edit_profile_row['pri_phone'];
      $ssn = $edit_profile_row['ssn'];
      $date_of_birth = $edit_profile_row['date_of_birth'];
      $address_line_one = $edit_profile_row['address_line_one'];
      $city_name = $edit_profile_row['city_name'];
      $postal_cd = $edit_profile_row['postal_cd'];
    }

    echo $edit_profile;
  } else {
    echo $create_profile;
    mysqli_error($dbh);
  }

?>

  <div class="card">
    <div class="card-header bg-info text-white">Applicant</div>
    <div class="card-body">
      <div class="form-group row">
        <!-- First Name -->
        <label for="first_name" class="col-md-2 col-form-label">First Name</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name ?>" required/>
          <div class="invalid-feedback">Dude, you need a First Name</div>
        </div>
      </div>

      <!-- Middle Name -->
      <div class="form-group row">
        <label for="middle_name" class="col-md-2 col-form-label">Middle Name</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $middle_name ?>" required/>
        </div>
      </div>

      <!-- Last Name -->
      <div class="form-group row">
        <label for="last_name" class="col-md-2 col-form-label">Last Name</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name ?>" required/>
          <div class="invalid-feedback">Last Name is required</div>
        </div>
      </div>

      <!-- Email -->
      <div class="form-group row">
        <label for="email_id" class="col-md-2 col-form-label">Email</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="email_id" name="email_id" value="<?php echo $email_id ?>" required/>
          <div class="invalid-feedback">Email is required</div>
        </div>
      </div>

      <!-- Phone -->
      <div class="form-group row">
        <label for="pri_phone" class="col-md-2 col-form-label">Phone</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="pri_phone" name="pri_phone" placeholder="###-###-####" value="<?php echo $pri_phone ?>" required/>
        </div>
      </div>

      <!-- SSN -->
      <div class="form-group row">
        <label for="ssn" class="col-md-2 col-form-label">SSN</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="ssn" name="ssn" placeholder="###-##-####" value="<?php echo $ssn ?>" required/>
          <div class="invalid-feedback">SSN is required</div>
        </div>
      </div>

      <!-- Date of Birth -->
      <div class="form-group row">
        <label for="date_of_birth" class="col-md-2 col-form-label">Date of Birth</label>
        <div class="col-md-6">
          <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $date_of_birth ?>" required/>
          <div class="invalid-feedback">Date of Birth is required</div>
        </div>
      </div>

    </div>
  </div>

  <br/>

  <div class="card">
    <div class="card-header bg-info text-white">Address</div>
    <div class="card-body">

      <!-- Address -->
      <div class="form-group row">
        <label for="address_line_one" class="col-md-2 col-form-label">Address</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="address_line_one" name="address_line_one" value="<?php echo $address_line_one ?>" required/>
          <div class="invalid-feedback">Address is required</div>
        </div>
      </div>

      <!-- City -->
      <div class="form-group row">
        <label for="city_name" class="col-md-2 col-form-label">City</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="city_name" name="city_name" value="<?php echo $city_name ?>" required/>
          <div class="invalid-feedback">City is required</div>
        </div>
      </div>

      <!-- State -->
      <div class="form-group row">
        <label for="state_cd" class="col-md-2 col-form-label">State</label>
        <div class="form-group col-md-6">
          <select name="state_cd" class="form-control">
            <option value="Georgia">Georgia</option>
            <option value="New York">New York</option>
            <option value="Texas">Texas</option>
          </select>
          <div class="invalid-feedback">State is required</div>
        </div>
      </div>

      <!-- Zip -->
      <div class="form-group row">
        <label for="postal_cd" class="col-md-2 col-form-label">Zip</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="postal_cd" name="postal_cd" value="<?php echo $postal_cd ?>" required/>
          <div class="invalid-feedback">Zip is required</div>
        </div>
      </div>
    </div>
  </div>

  <br/>
  <div class="card">
    <div class="card-header bg-success text-white">Review and Submit</div>
    <div class="card-body">
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="agreement_sw" name="agreement_sw" value="Y" required>
          <label class="form-check-label" for="agreement_sw">All information provided is true and correct to the best of my knowledge</label>
          <div class="invalid-feedback">You must certify that information provided is true and accurate to the best of your knowledge</div>
        </div>
      </div>
      <button type="submit" class="btn btn-lg btn-success">Continue</button>
    </div>
  </div>

</form>
