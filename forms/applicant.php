<?php
# get the values submitted from the website

$first_name = isset($_REQUEST['first_name']) ? $_REQUEST['first_name'] : null;
$middle_name = isset($_REQUEST['middle_name']) ? $_REQUEST['middle_name'] : null;
$last_name = isset($_REQUEST['last_name']) ? $_REQUEST['last_name'] : null;
$ssn = isset($_REQUEST['ssn']) ? $_REQUEST['ssn'] : null;
$date_of_birth = isset($_REQUEST['date_of_birth']) ? $_REQUEST['date_of_birth'] : null;
$pri_phone = isset($_REQUEST['pri_phone']) ? $_REQUEST['pri_phone'] : null;
$email_id = isset($_REQUEST['email_id']) ? $_REQUEST['email_id'] : null;
$address_line_one = isset($_REQUEST['address_line_one']) ? $_REQUEST['address_line_one'] : null;
$city_name = isset($_REQUEST['city_name']) ? $_REQUEST['city_name'] : null;
$state_cd = isset($_REQUEST['state_cd']) ? $_REQUEST['state_cd'] : null;
$postal_cd = isset($_REQUEST['postal_cd']) ? $_REQUEST['postal_cd'] : null;
$agreement_sw = isset($_REQUEST['agreement_sw']) ? $_REQUEST['agreement_sw'] : null;

# error handling..
$errors = array();
if ( empty($first_name) ) { $errors[] = 'First Name is required'; }
if ( empty($middle_name) ) { $errors[] = 'Middle name or initial is required'; }
if ( empty($last_name) ) { $errors[] = 'Last name is required'; }
if ( empty($email_id) ) { $errors[] = 'Email is required'; }
if ( empty($pri_phone) ) { $errors[] = 'Phone number is required'; }

if ( empty($ssn) ) { $errors[] = 'Social Security is required'; }
if ( empty($date_of_birth) ) { $errors[] = 'Date of Birth is required'; }
if ( empty($agreement_sw) ) { $errors[] = 'You must certify this information is true'; }

if ( empty($address_line_one) ) { $errors[] = 'Address is required'; }
if ( empty($city_name) ) { $errors[] = 'City is required'; }
if ( empty($state_cd) ) { $errors[] = 'State is required'; }
if ( strlen($postal_cd) < 5 ) { $errors[] = 'Zip code is required'; }

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

    include_once $_SERVER['DOCUMENT_ROOT'] . '/job-app/forms/applicant_form.php';

  } else {
  # prepare for database..
  $first_name = empty($first_name) ? 'NULL' : "\"$first_name\"";
  $middle_name = empty($middle_name) ? 'NULL' : "\"$middle_name\"";
  $last_name = empty($last_name) ? 'NULL' : "\"$last_name\"";
  $ssn = empty($ssn) ? 'NULL' : "\"$ssn\"";
  $date_of_birth = empty($date_of_birth) ? 'NULL' : "\"$date_of_birth\"";
  $pri_phone = empty($pri_phone) ? 'NULL' : "\"$pri_phone\"";
  $email_id = empty($email_id) ? 'NULL' : "\"$email_id\"";
  $address_line_one = empty($address_line_one) ? 'NULL' : "\"$address_line_one\"";
  $city_name = empty($city_name) ? 'NULL' : "\"$city_name\"";
  $state_cd = empty($state_cd) ? 'NULL' : "\"$state_cd\"";
  $postal_cd = empty($postal_cd) ? 'NULL' : "\"$postal_cd\"";
  $agreement_sw = empty($agreement_sw) ? 'NULL' : "\"$agreement_sw\"";

  # SQL to save the data
  $sql =<<<HereDoc
  insert into applicant_info (
    first_name,
    middle_name,
    last_name,
    ssn,
    date_of_birth,
    pri_phone,
    email_id,
    address_line_one,
    city_name,
    state_cd,
    postal_cd,
    agreement_sw,
    lastmod
  ) values (
    $first_name,
    $middle_name,
    $last_name,
    $ssn,
    $date_of_birth,
    $pri_phone,
    $email_id,
    $address_line_one,
    $city_name,
    $state_cd,
    $postal_cd,
    $agreement_sw,
    now()
  )

HereDoc;

  if (mysqli_query($dbh,$sql) && mysqli_affected_rows($dbh) > 0) {
    echo <<<HereDoc
  <div class="alert alert-primary">Applicant information saved successfully<p>Continue to the next step</p></div>

HereDoc;
    include_once 'forms/employment_history_form.php';

  } else {
    $error_message = mysqli_error($dbh);
    echo <<<HereDoc
  <div class="alert alert-warning">
    <h4>Problem Saving Applicant information</h4>
    $error_message
    <pre>$sql</pre>
  </div>

HereDoc;

  }
}
?>
