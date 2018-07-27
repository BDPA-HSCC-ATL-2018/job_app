<?php
  $page_title = "Employment History";
  include $_SERVER['DOCUMENT_ROOT'] . '/job_app/web-assets/tpl/app_header.php';

  $applicant_id = $_SESSION['applicant_id'];

  $employment_sql = <<<SQL
    SELECT * FROM employment WHERE applicant_id = $applicant_id;
SQL;

  $employment_result = $dbh->query($employment_sql);

  if ($employment_result) {
    while ($employment_row = $employment_result->fetch_assoc()) {
      $e_id = $employment_row['id'];
      $e_name = $employment_row['e_name'];
      $e_phone = $employment_row['e_phone'];
      $e_city = $employment_row['e_city'];
      $e_start_date = $employment_row['e_start_date'];
      $e_end_date = $employment_row['e_end_date'];
      $e_position = $employment_row['e_position'];
      $e_description = $employment_row['e_description'];

      echo <<<CARD
        <div class="card my-4">
            <div class="card-header">
              $e_name
              <a href="index.php?action=deleteemployment&id=$e_id" class="btn btn-primary float-right">Delete</a>
            </div>
            <div class="card-body">
              Phone: $e_phone <br>
              City: $e_city <br>
              Start Date: $e_start_date <br>
              End Date: $e_end_date <br>
              Position: $e_position <br>
              Job Description: $e_description
            </div>
        </div>
CARD;
    }
  } else {
    echo "Error <br>";
    echo "Applicant ID: " . $applicant_id;
    mysqli_error($dbh);
  }

  include $_SERVER['DOCUMENT_ROOT'] . '/job_app/web-assets/tpl/app_footer.php';
?>
