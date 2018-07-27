<?php
$page_title = "Processing Application";

include_once $_SERVER['DOCUMENT_ROOT'] . '/job_app/web-assets/lib/db.php';

$email_id= isset($_REQUEST['email_id']) ? $_REQUEST['email_id'] : null;


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
  $_SESSION['email_id'] = "$email_id";

    while ($row = mysqli_fetch_array($sth)) {
      foreach( $row AS $key => $val ) {
        $$key = stripslashes($val);
      }
      echo <<<HereDoc
<div class="alert alert-primary">$first_name, we found your application. Please review progress below.</div>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Application Progress</div>
      <table class="table table-sm">
        <tr><th>Applicant Profile</th> <td><a class="btn btn-primary" href="/job_app/?action=edit_profile">Edit</a></td></tr>
        <tr><th>Education</th> <td><a class="btn btn-primary" href="/job_app/?action=add_edu" >Add</a></td></tr>
        <tr><th>Employment</th> <td><a class="btn btn-primary" href="/job_app/?action=add_emp" >Add</a></td></tr>
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
  $_SESSION['email_id'] = null;
  applicantForm($email_id);
}
