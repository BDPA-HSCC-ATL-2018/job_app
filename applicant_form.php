<div class= "container-fluid">
  <h1><?php echo $page_title ?> <br> </h1>

  <div class="alert alert-info" role="alert">All fields in this section are required</div>

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="applicant.php">Applicant Info</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="employment_history.php">Employment History</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="education_history.php">Education History</a>
    </li>
  </ul>
  <br/>
<!-- MAKE THIS PAGE -->
  <form id="applicant" method="post" action="/job_app/index.php" class="needs-validation" novalidate >

    <div class="card border-info">
      <div class="card-header">General Info</div>
      <div class="card-body">

        <div class="form-group row">
          <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
          <div class= "col-md-6">
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name; ?>" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="middle_name" class="col-sm-2 col-form-label">Middle Name</label>
          <div class= "col-md-6">
            <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $middle_name; ?>" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
          <div class= "col-md-6">
            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name; ?>" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="ssn" class="col-sm-2 col-form-label">SSN</label>
          <div class= "col-md-6">
            <input type="text" class="form-control" id="ssn" name="ssn" placeholder="AAA-GG-SSSS" value="<?php echo $ssn; ?>" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="date_of_birth" class="col-sm-2 col-form-label">Date of Birth</label>
          <div class= "col-md-6">
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $date_of_birth; ?>" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="pri_phone" class="col-sm-2 col-form-label">Phone</label>
          <div class= "col-md-6">
            <input type="number" class="form-control" id="pri_phone" name="pri_phone" value="<?php echo $pri_phone; ?>" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="email_id" class="col-sm-2 col-form-label">Email</label>
          <div class= "col-md-6">
            <input type="email" class="form-control" id="email_id" name="email_id" value="<?php echo $email_id; ?>" required >
          </div>
        </div>

      </div>
    </div>
    <br/>

    <div class="card border-info">
      <div class="card-header">Address</div>
      <div class="card-body">

        <div class="form-group row">
          <label for="address_line_one" class="col-sm-2 col-form-label">Street Address</label>
          <div class= "col-md-6">
            <input type="text" class="form-control" id="address_line_one" name="address_line_one" value="<?php echo $address_line_one; ?>" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="city_name" class="col-sm-2 col-form-label">City</label>
          <div class= "col-md-6">
            <input type="text" class="form-control" id="city_name" name="city_name" value="<?php echo $city_name; ?>" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="state_cd" class="col-sm-2 col-form-label">State</label>
          <div class= "col-md-6">
            <input type="text" class="form-control" id="state_cd" name="state_cd" value="<?php echo $state_cd; ?>" required>
            <div class="invalid-feedback">
        Please provide a valid state.
      </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="postal_cd" class="col-sm-2 col-form-label">Zip</label>
          <div class= "col-md-6">
            <input type="text" class="form-control" id="postal_cd" name="postal_cd" value="<?php echo $postal_cd; ?>" required>
          </div>
        </div>
      </div>
    </div>

<br/>
<div class="card">
  <div class="card-header bg-info text-white">Review and Submit</div>
  <div class="card-body">
    <input type="hidden" name="action" value="applicantinfo">
        <button type="submit" class="btn btn-lg btn-primary">Next</button>
</div>
</div>
  </form>



</div>
