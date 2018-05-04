<?php
$page_title = "Education History";
include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_nav.php';
?>

<div class= "container-fluid">
  <h1><?php echo $page_title ?></h1>
  <div class="alert alert-info" role="alert">All fields in this section are required</div>

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="applicant_form.php">Applicant Info</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="employment_history.php">Employment History</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="education_history.php">Education History</a>
    </li>
  </ul>
  <br/>



  <div class="card border-info">
    <div class="card-header">Education History</div>
    <div class="card-body">
      <form action="education_history_form.php">
        <div class="form-group row">
          <label for="i_name" class="col-sm-2 col-form-label">Institution Name</label>
          <div class= "col-md-6">
            <input type="text" class="form-control" id="i_name" placeholder="Institution Name">
          </div>
        </div>

        <!-- <div class="input-group row">
          <div class= "col-md-6">
            <select class="custom-select" id="#">
              <option selected>Type of Institution</option>
              <option value="#">Post-secondary Institution</option>
              <option value="#">High School</option>
              <option value="#">Other (specify below)</option>
            </select>
          </div>
        </div> -->
        <br>
        <div class="form-group row">
          <label for="i_city" class="col-sm-2 col-form-label">City</label>
          <div class= "col-md-6">
            <input type="text" class="form-control" id="i_city">
          </div>
        </div>

        <div class="form-group row">
          <label for="i_state" class="col-sm-2 col-form-label">State</label>
          <div class= "col-md-6">
            <input type="text" class="form-control" id="i_state">
          </div>
        </div>

        <div class="form-group row">
          <label for="i_start_date" class="col-sm-2 col-form-label">Start Date</label>
          <div class= "col-md-6">
            <input type="date" class="form-control" id="i_start_date" >
          </div>
        </div>
        <div class="form-group row">
          <label for="i_end_date" class="col-sm-2 col-form-label">Graduation (or expected) Date</label>
          <div class= "col-md-6">
            <input type="date" class="form-control" id="i_end_date" >
          </div>
</div>
</div>
        </div>
<br/>
<div class="card">
  <div class="card-header bg-info text-white">Review and Submit</div>
  <div class="card-body">
        <button type="submit" class="btn btn-lg btn-primary">Next</button>
</div>
</div>
      </form>





</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_footer.php'; ?>
