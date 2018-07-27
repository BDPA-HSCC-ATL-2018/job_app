<?php
$page_title = "Processing Application";

include_once $_SERVER['DOCUMENT_ROOT'] . '/job_app/web-assets/tpl/app_header.php';


if (isset($_REQUEST['email_id'])) {
  $email_id = $_REQUEST['email_id'];
} else if (isset($_SESSION['email_id'])) {
  $email_id = $_SESSION['email_id'];
} else {
  header("Location: /job_app/forms/welcome_form.php");
}


$errors = array();

if ( empty($email_id) ) { $errors[] = 'Email address is required'; }

# now check whether we have errors..
if (count($errors)) {
  echo <<<HereDoc
<div class="card">
  <div class="card-header bg-warning text-white">Please review the following:</div>
      <div class="panel-body">
      <ol>

HereDoc;

  foreach ($errors as $error_item) {
    echo "<li>$error_item</li>";
  }
  echo <<<HereDoc
      </ol>
      </div>
</div><br/>
HereDoc;

    include_once __DIR__ . '/forms/applicant_form.php';
    return;
}

$sql = <<<HereDoc
select
  applicant_id,
  first_name,
  middle_name,
  last_name,
  pri_phone,
  address_line_one,
  city_name,
  state_cd,
  postal_cd
from applicants
where email_id = "$email_id";

HereDoc;

if ( !$sth = mysqli_query($dbh,$sql) ) {
$message= mysqli_error($dbh);
  echo <<<HereDoc
    <div class="alert alert-warning"> $message </div>
HereDoc;
return;
}

if ( mysqli_num_rows($sth) > 0 ) {

    while ($row = mysqli_fetch_array($sth)) {
      foreach( $row AS $key => $val ) {
        $$key = stripslashes($val);

        $_SESSION['applicant_id'] = $row['applicant_id'];
      }
      echo <<<HereDoc
<div class="alert alert-primary">$first_name, we found your application. Please review progress below.</div>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Application Progress</div>
      <table class="table table-sm">
        <tr><th>Applicant Profile</th> <td><a class="btn btn-primary" href="/job_app/?action=edit_profile">Edit</a></td></tr>
        <tr><th><a href="view_education_records.php">Education</a></th><td><a class="btn btn-primary" href="/job_app/?action=add_edu">Add</a></td></tr>
        <tr><th><a href="view_employment_records.php">Employment</a></th> <td><a class="btn btn-primary" href="/job_app/?action=add_emp">Add</a></td></tr>
      </table>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <div class="card-header">Welcome $first_name $last_name</div>
        <div class="card-body">
          $first_name $middle_name $last_name <br/>
          $address_line_one <br/>
          $city_name, $state_cd $postal_cd <br/>
          $email_id <br/>
        </div>
    </div>
  </div>
</div>


HereDoc;
    }
} else {

  // Creates an applicant
  function applicantForm($email_id=null) {
    global
      $dbh,
      $applicant_id,
      $first_name,
      $middle_name,
      $last_name,
      $ssn,
      $date_of_birth,
      $pri_phone,
      $address_line_one,
      $city_name,
      $state_cd,
      $postal_cd,
      $agreement_sw;

      $email_id = isset($_SESSION['email_id']) ? $_SESSION['email_id'] : $email_id;
      if ($email_id) {
        $sql = <<<HereDoc


HereDoc;
      }

      $page_title="Applicant Profile";
    include_once __DIR__ . '/forms/applicant_form.php';
  }

  $_SESSION['email_id'] = null;
  applicantForm($email_id);
}
