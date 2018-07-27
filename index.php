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
  'edit' => 'editProfile', //This edit will change the database values.
  'createeduhistory' => 'createeduhistory', //Create Education History
  'createemphistory' => 'createemphistory', //Create Employment History
  'deleteeducation' => 'deleteEducation', //Deletes an education record from the database.
  'deleteemployment' => 'deleteEmployment', //Deletes an employment record from the database.
  'logout' => 'logout'
);

if (array_key_exists($action, $options)) {
  $function = $options[$action];
  call_user_func($function);
} else {
  echo $_REQUEST['action'];
  welcomeForm();
}

//Welcome Form - The first page the user sees; asks for the person to log in.
function welcomeForm() {
  global $dbh, $email_id;

  if ( isset($_SESSION['email_id']) && !empty($_SESSION['email_id'])) {
    welcome();
  } else {
    $page_title = "Welcome";
    include_once __DIR__ . '/forms/welcome_form.php';
  }
}

// Welcome Page - The first page the user sees after logging in; has all the user info
function welcome() {
  global $dbh;
  include_once __DIR__ . '/welcome.php';
}

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

//Edit Applicant - Edits an existing user.
function editApplicant() {
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

  $sql = <<<HereDoc
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
  header("Location: /job_app/forms/applicant_form.php?edit=edit");
}

//Aplicant Info
function applicantInfo() {
  global $dbh;
  include_once __DIR__ . '/applicant.php';
}

// Education Info
function educationInfo() {
  global $dbh;
  include_once __DIR__ . '/forms/education_history.php';
}

// Employment Info
function employmentInfo() {
  global $dbh;
  include_once __DIR__ . '/forms/employment_history.php';
}

//Edit
function editProfile() {
  global $dbh;
  $email_id = $_SESSION['email_id'];

  $first_name = $_REQUEST['first_name'];
  $middle_name = $_REQUEST['middle_name'];
  $last_name = $_REQUEST['last_name'];
  $email_id_change = $_REQUEST['email_id'];
  $ssn = $_REQUEST['ssn'];
  $date_of_birth = $_REQUEST['date_of_birth'];
  $pri_phone = $_REQUEST['pri_phone'];
  $address_line_one = $_REQUEST['address_line_one'];
  $city_name = $_REQUEST['city_name'];
  $state_cd = $_REQUEST['state'];
  $postal_cd = $_REQUEST['postal_cd'];

  $edit_profile_sql = <<<EDITPROF
    UPDATE applicants
    SET first_name = "$first_name",
    last_name = "$last_name",
    email_id = "$email_id_change",
    ssn = "$ssn",
    date_of_birth = "$date_of_birth",
    pri_phone = "$pri_phone",
    address_line_one = "$address_line_one",
    city_name = "$city_name",
    state_cd = "$state_cd",
    postal_cd = "$postal_cd"
    WHERE email_id = "$email_id";
EDITPROF;

    $edit_profile_result = $dbh->query($edit_profile_sql);

    if ($edit_profile_result) {
      //Now change the session email.
      $_SESSION['email_id'] = $email_id_change;

      //Go to the main page.
      welcome();
    } else {
      echo "Error <br>";
      echo "First Name: " . $first_name . "<br>";
      echo "Middle Name: " . $middle_name . "<br>";
      echo "Last Name: " . $last_name . "<br>";
      echo "Email: " . $email_id . "<br>";
      echo "Email Change: " . $email_id_change . "<br>";
      echo "SSN: " . $ssn . "<br>";
      echo "Date of Birth: " . $date_of_birth . "<br>";
      echo "Primary Phone: " . $pri_phone . "<br>";
      echo "Address: " . $address_line_one . "<br>";
      echo "City: " . $city_name . "<br>";
      echo "State: " . $state_cd . "<br>";
      echo "Zip Code: " . $postal_cd . "<br>";
      echo $_SESSION['email_id'];
      mysqli_error($dbh);
    }
}

function createeduhistory() {
  global $dbh;

  $applicant_id = $_SESSION['applicant_id'];
  $i_name = $_REQUEST['i-name'];
  $i_type = $_REQUEST['i-type'];
  $i_start_date = $_REQUEST['i-start-date'];
  $i_end_date = $_REQUEST['i-end-date'];
  $i_grad_date = $_REQUEST['i-grad-date'];

  $create_edu_history_sql = <<<SQL
    INSERT INTO education(applicant_id, i_name, i_type, i_start_date, i_end_date, i_grad_date)
    VALUES($applicant_id, "$i_name", "$i_type", "$i_start_date", "$i_end_date", "$i_grad_date");
SQL;

  $create_edu_history_result = $dbh->query($create_edu_history_sql);

  if ($create_edu_history_result) {
    welcome();
  } else {
    echo "Error";
    mysqli_error($dbh);
  }
}

function createemphistory() {
  global $dbh;

  $applicant_id = $_SESSION['applicant_id'];
  $e_name = $_REQUEST['e-name'];
  $e_city = $_REQUEST['e-city'];
  $e_state = $_REQUEST['e-state'];
  $e_start_date = $_REQUEST['e-start-date'];
  $e_end_date = $_REQUEST['e-end-date'];
  $e_position = $_REQUEST['e-position'];
  $e_description = $_REQUEST['e-description'];
  $e_phone = $_REQUEST['e-phone'];

  $create_emp_history_sql = <<<SQL
    INSERT INTO employment(applicant_id, e_name, e_city, e_state, e_start_date, e_end_date, e_position, e_description, e_phone)
    VALUES($applicant_id, "$e_name", "$e_city", "$e_state", "$e_start_date", "$e_end_date", "$e_position", "$e_description", "$e_phone");
SQL;

  $create_emp_history_result = $dbh->query($create_emp_history_sql);

  if ($create_emp_history_result) {
    welcome();
  } else {
    echo "Error <br>";
    echo "Name: " . $e_name . "<br>";
    echo "City: " . $e_city . "<br>";
    echo "State: " . $e_state . "<br>";
    echo "Start Date: " . $e_start_date . "<br>";
    echo "End Date: " . $e_end_date . "<br>";
    echo "Position: " . $e_position . "<br>";
    echo "Description: " . $e_description . "<br>";
    echo "Phone: " . $e_phone . "<br>";
    echo $_SESSION['email_id'];
    mysqli_error($dbh);
  }
}

//Delete Education
function deleteEducation() {
  global $dbh;

  $applicant_id = $_SESSION['applicant_id'];
  $i_id = $_REQUEST['id'];

  $delete_education_sql = <<<SQL
    DELETE FROM education WHERE applicant_id = $applicant_id AND i_id = $i_id;
SQL;

  $delete_education_result = $dbh->query($delete_education_sql);

  if ($delete_education_result) {
    welcome();
  } else {
    echo "An error occured. Please try again.";
  }
}

//Delete Employment
function deleteEmployment() {
  global $dbh;

  $applicant_id = $_SESSION['applicant_id'];
  $e_id = $_REQUEST['id'];

  $delete_employemnt_sql = <<<SQL
    DELETE FROM employment WHERE applicant_id = $applicant_id AND id = $e_id;
SQL;

  $delete_employment_result = $dbh->query($delete_employemnt_sql);

  if ($delete_employment_result) {
    welcome();
  } else {
    echo "An error occured. Please try again.";
  }
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
