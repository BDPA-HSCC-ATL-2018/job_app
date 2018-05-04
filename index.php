<?php

$page_title= "Employment Applicant";
include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_nav.php';

$action = (isset($_REQUEST['action']) ? $_REQUEST['action'] : 'default');

$options = array(
  'applicantinfo' => 'applicantInfo',
  'edit_profile' => 'editApplicant',
  'add_edu' => 'educationInfo',
  'add_emp' => 'employmentInfo',
  'welcome' => 'welcome',
);

if (array_key_exists($action, $options)) {
  $function = $options[$action];
  call_user_func($function);
} else {
  welcomeForm();
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_footer.php';

function welcomeForm() {
  global $dbh, $email_id;

  if ( isset($_SESSION['email_id']) && !empty($_SESSION['email_id'])) {
    welcome();
  } else {
    $page_title="Welcome";
    include_once __DIR__ . '/forms/welcome_form.php';
  }
}

function welcome() {
  global $dbh;
  include_once __DIR__ . '/welcome.php';
}

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

function editApplicant($email_id=null) {
  global $dbh,
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
  $agreement_sw,
  $page_title;
  include_once __DIR__ . '/forms/applicant_form.php';
}

function applicantInfo() {
  global $dbh;
  include_once __DIR__ . '/applicant.php';
}

function educationInfo() {
  global $dbh;
  include_once __DIR__ . '/forms/education.php';
}

function employmentInfo() {
  global $dbh;
  include_once __DIR__ . '/forms/employment.php';
}



?>
