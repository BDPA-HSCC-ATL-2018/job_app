<?php
  $page_title = "Education History";
  include $_SERVER['DOCUMENT_ROOT'] . '/job_app/web-assets/tpl/app_header.php';

  $applicant_id = $_SESSION['applicant_id'];

  $education_sql = <<<SQL
    SELECT * FROM education WHERE applicant_id = $applicant_id;
SQL;

  $education_result = $dbh->query($education_sql);

  if ($education_result) {
    while ($education_row = $education_result->fetch_assoc()) {
      $i_id = $education_row['i_id'];
      $i_name = $education_row['i_name'];
      $i_start_date = $education_row['i_start_date'];
      $i_end_date = $education_row['i_end_date'];
      $i_type = $education_row['i_type'];
      $i_grad_date = $education_row['i_grad_date'];

      echo <<<CARD
        <div class="card my-4">
            <div class="card-header">
              $i_name
              <a href="index.php?action=deleteeducation&id=$i_id" class="btn btn-primary float-right">Delete</a>
            </div>
            <div class="card-body">
              Start Date: $i_start_date <br>
              End Date: $i_end_date <br>
              Type: $i_type <br>
              Graduation Date: $i_grad_date
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
