<!-- This website will have two different outputs depending on if the user is editing or not. There will be a REQUEST variable to see if the user is editing. -->

<?php $page_title = "Applicant Info";
  include_once $_SERVER['DOCUMENT_ROOT'] . "/web-assets/tpl/app_header.php";

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

  if (isset($_REQUEST['edit']) && ($_REQUEST['edit']) == 'edit') {
    $first_name = $_SESSION['first_name'];
    $middle_name = $_SESSION['middle_name'];
    $last_name = $_SESSION['last_name'];
    $email_id = $_SESSION['email_id'];
    $pri_phone = $_SESSION['phone'];
    $ssn = $_SESSION['ssn'];
    $date_of_birth = $_SESSION['dob'];
    $address_line_one = $_SESSION['address'];
    $city_name = $_SESSION['city'];
    $postal_cd = $_SESSION['zip_code'];
  }

$edit_profile =<<<EDIT
<form id="applicant" method="post" action="/../data.php?function=edit" class="needs-validation" novalidate>

  <div class="card">
    <div class="card-header bg-info text-white">Applicant</div>
    <div class="card-body">
      <div class="form-group row">
        <label for="first_name" class="col-md-2 col-form-label">First Name</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="first_name" name="first_name" value="$first_name" required/>
          <div class="invalid-feedback">Dude, you need a First Name </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="middle_name" class="col-md-2 col-form-label">Middle Name</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="middle_name" name="middle_name" value="$middle_name" required/>
        </div>
      </div>

      <div class="form-group row">
        <label for="last_name" class="col-md-2 col-form-label">Last</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="last_name" name="last_name" value="$last_name" required/>
          <div class="invalid-feedback">Last Name is required</div>
        </div>
      </div>

      <div class="form-group row">
        <label for="email_id" class="col-md-2 col-form-label">Email</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="email_id" name="email_id" value="$email_id" required/>
          <div class="invalid-feedback">Email is required</div>
        </div>
      </div>

      <div class="form-group row">
        <label for="pri_phone" class="col-md-2 col-form-label">Phone</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="pri_phone" name="pri_phone" placeholder="###-###-####" value="$pri_phone" required/>
        </div>
      </div>

      <div class="form-group row">
        <label for="ssn" class="col-md-2 col-form-label">SSN</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="ssn" name="ssn" placeholder="###-##-####" value="$ssn" required/>
          <div class="invalid-feedback">SSN is required</div>
        </div>
      </div>

      <div class="form-group row">
        <label for="date_of_birth" class="col-md-2 col-form-label">Date of Birth</label>
        <div class="col-md-6">
          <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="$date_of_birth" required/>
          <div class="invalid-feedback">Date of Birth is required</div>
        </div>
      </div>

    </div>
  </div>

  <br/>

  <div class="card">
    <div class="card-header bg-info text-white">Address</div>
    <div class="card-body">
      <div class="form-group row">
        <label for="address_line_one" class="col-md-2 col-form-label">Address</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="address_line_one" name="address_line_one" value="$address_line_one" required/>
          <div class="invalid-feedback">Address is required</div>
        </div>
      </div>

      <div class="form-group row">
        <label for="city_name" class="col-md-2 col-form-label">City</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="city_name" name="city_name" value="$city_name" required/>
          <div class="invalid-feedback">City is required</div>
        </div>
      </div>

      <div class="form-group row">
        <label for="state_cd" class="col-md-2 col-form-label">State</label>
        <div class="form-group col-md-6">
          <select name="state" class="form-control">
            <option value="GA">Georgia</option>
            <option value="NY">New York</option>
            <option value="TX">Texas</option>
          </select>
          <div class="invalid-feedback">State is required</div>
        </div>
      </div>

      <div class="form-group row">
        <label for="postal_cd" class="col-md-2 col-form-label">Zip</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="postal_cd" name="postal_cd" value="$postal_cd" required/>
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
          <input type="hidden" id="action" name="action" value="applicant-info"/>
          <label class="form-check-label" for="agreement_sw">All information provided is true and correct to the best of my knowledge</label>
          <div class="invalid-feedback">You must certify that information provided is true and accurate to the best of your knowledge</div>
        </div>
      </div>
      <button type="submit" class="btn btn-lg btn-success">Continue</button>
    </div>
  </div>

</form>
EDIT;

$create_profile =<<<CREATE
<form id="applicant" method="post" action="/../data.php?function=create" class="needs-validation" novalidate>

  <div class="card">
    <div class="card-header bg-info text-white">Applicant</div>
    <div class="card-body">
      <div class="form-group row">
        <label for="first_name" class="col-md-2 col-form-label">First Name</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="first_name" name="first_name" required/>
          <div class="invalid-feedback">Dude, you need a First Name </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="middle_name" class="col-md-2 col-form-label">Middle Name</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="middle_name" name="middle_name" required/>
        </div>
      </div>

      <div class="form-group row">
        <label for="last_name" class="col-md-2 col-form-label">Last</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="last_name" name="last_name" required/>
          <div class="invalid-feedback">Last Name is required</div>
        </div>
      </div>

      <div class="form-group row">
        <label for="email_id" class="col-md-2 col-form-label">Email</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="email_id" name="email_id" required/>
          <div class="invalid-feedback">Email is required</div>
        </div>
      </div>

      <div class="form-group row">
        <label for="pri_phone" class="col-md-2 col-form-label">Phone</label>
        <div class="col-md-6">
          <input type="tel" class="form-control" id="pri_phone" name="pri_phone" placeholder="###-###-####" required/>
        </div>
      </div>

      <div class="form-group row">
        <label for="ssn" class="col-md-2 col-form-label">SSN</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="ssn" name="ssn" placeholder="###-##-####" required/>
          <div class="invalid-feedback">SSN is required</div>
        </div>
      </div>

      <div class="form-group row">
        <label for="date_of_birth" class="col-md-2 col-form-label">Date of Birth</label>
        <div class="col-md-6">
          <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required/>
          <div class="invalid-feedback">Date of Birth is required</div>
        </div>
      </div>

    </div>
  </div>

  <br/>

  <div class="card">
    <div class="card-header bg-info text-white">Address</div>
    <div class="card-body">
      <div class="form-group row">
        <label for="address_line_one" class="col-md-2 col-form-label">Address</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="address_line_one" name="address_line_one" required/>
          <div class="invalid-feedback">Address is required</div>
        </div>
      </div>

      <div class="form-group row">
        <label for="city_name" class="col-md-2 col-form-label">City</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="city_name" name="city_name"  required/>
          <div class="invalid-feedback">City is required</div>
        </div>
      </div>

      <div class="form-group row">
        <label for="state_cd" class="col-md-2 col-form-label">State</label>
        <div class="form-group col-md-6">
          <select name="state" class="form-control">
            <option value="GA">Georgia</option>
            <option value="NY">New York</option>
            <option value="TX">Texas</option>
          </select>
          <div class="invalid-feedback">State is required</div>
        </div>
      </div>

      <div class="form-group row">
        <label for="postal_cd" class="col-md-2 col-form-label">Zip</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="postal_cd" name="postal_cd"  required/>
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
          <input type="hidden" id="action" name="action" value="applicant-info"/>
          <label class="form-check-label" for="agreement_sw">All information provided is true and correct to the best of my knowledge</label>
          <div class="invalid-feedback">You must certify that information provided is true and accurate to the best of your knowledge</div>
        </div>
      </div>
      <button type="submit" class="btn btn-lg btn-success">Continue</button>
    </div>
  </div>

</form>
CREATE;

  if (isset($_REQUEST['edit']) && ($_REQUEST['edit']) == "edit") {
    echo $edit_profile;
  } else {
    echo $create_profile;
  }
  include_once $_SERVER['DOCUMENT_ROOT'] . "/web-assets/tpl/app_footer.php";
?>
