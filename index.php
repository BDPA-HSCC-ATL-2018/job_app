<?php
$page_title= "Employment Applicant";
include_once $_SERVER['DOCUMENT_ROOT'] . '/job_app/web-assets/tpl/app_header.php';

$action = (isset($_REQUEST['action']) ? $_REQUEST['action'] : 'default');

$options = array(
  'applicantinfo' => 'applicantInfo',
  'edit_profile' => 'editApplicant',
  'add_edu' => 'educationInfo',
  'add_emp' => 'employmentInfo',
  'welcome' => 'welcome',
  'edit' => 'edit', //This edit will ch ange the database values.
  'logout' => 'logout'
);

if (array_key_exists($action, $options)) {
  $function = $options[$action];
  call_user_func($function);
} else {
  welcomeForm();
}

//Welcome Form - The first page the user sees; asks for the person to log in.
function welcomeForm() {
  global $dbh, $email_id;

  if ( isset($_SESSION['email_id']) && !empty($_SESSION['email_id'])) {
    welcome();
  } else {
    include_once __DIR__ . '/forms/welcome_form.php';
  }
}

//Welcome Page - The first page the user sees after logging in; has all the user info
function welcome() {
  global $dbh;
  include_once __DIR__ . '/welcome.php';
}

//Creates an applicant
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

//Edit Applicant - Edits an existing user.
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

  $sql =<<<HereDoc
select
  applicant_id,
  first_name,
  middle_name,
  last_name,
  ssn,
  date_of_birth,
  pri_phone,
  address_line_one,
  city_name,
  state_cd,
  postal_cd,
  agreement_sw
from applicants
where email_id='$email_id'

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
      }
    }
  }
  include_once __DIR__ . '/forms/applicant_form.php';
}

//Aplicant Info
function applicantInfo() {
  global $dbh;
  include_once __DIR__ . '/applicant.php';
}

//Education Info
function educationInfo() {
  global $dbh;
  include_once __DIR__ . '/forms/education.php';
}

//Employment Info
function employmentInfo() {
  global $dbh;
  include_once __DIR__ . '/forms/employment.php';
}

//Logout
function logout() {
  session_unset();
  session_destroy();
  welcomeForm();
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_footer.php';

/* Flow of this website.
1. The welcomeForm() function is run when the user fist arrives at the website. This works because $action is set to 'default' since there was no action passed, and in the if-else statment checking whether the array key exists, since it doesn't, the code in the else block is run, which takes us to the welcomeForm function.

2. welcomeForm() first globalizes $dbh and $email_id. Secondly, it checks to see if $email_id is set, and if it's not empty. Upon first arriving to the site, neither of those are true, so the code in the else block is run. The else block includes the page '/forms/welcome_form.php', and this is the page that asks us to enter an email address.

3. welcome_form.php (in the forms folder) has an action that takes us to the index, and with a input of type hidden and name of action, it passes the value "welcome", so the index page runs the welcome function, which just includes welcome.php.

4. welcome.php checks to see if the user exists by getting the user's email and putting it in a variable called $email_id, and it runs a SQL statement. If that SQL statement returns more than 0 rows (meaning that the user has already signed up and entered information into the database), then it displays the user's information. If 0 rows are returned, the code in the else block is run, and the applicantForm function is run and passed $email_id.

The rest is dependent on what the user clicks on and is still being fixed.
*/
?>
