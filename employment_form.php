
<div class= "container-fluid">
  <h1><?php echo $page_title ?></h1>
  <div class="alert alert-info" role="alert">All fields in this section are required</div>

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="applicant_form.php">Applicant Info</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="employment_history.php">Employment History</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="education_history.php">Education History</a>
    </li>
  </ul>
  <br/>
  <div class="card border-info">
    <div class="card-header">Employment History</div>
    <div class="card-body">
<!-- MAKE THIS PAGE -->



      <form action="employment_history_form.php" method="post">
        <div class="form-group row">
          <label for="e_name" class="col-sm-2 col-form-label">Employer Name</label>
          <div class= "col-md-6">
            <input type="text" class="form-control" id="e_name">
          </div>
        </div>

        <div class="form-group row">
          <label for="e_phone" class="col-sm-2 col-form-label">Employer Telephone</label>
          <div class= "col-md-6">
            <input type="tel" class="form-control" id="e_phone" placeholder="(###)-###-####">
          </div>
        </div>

        <div class="form-group row">
          <label for="e_city" class="col-sm-2 col-form-label">City</label>
          <div class= "col-md-6">
            <input type="text" class="form-control" id="e_city">
          </div>
        </div>

        <div class="form-group row">
          <label for="e_state" class="col-sm-2 col-form-label">State</label>
          <div class= "col-md-6">
            <input type="text" class="form-control" id="e_state">
          </div>
        </div>

        <div class="form-group row">
          <label for="e_start_date" class="col-sm-2 col-form-label">Start Date</label>
          <div class= "col-md-6">
            <input type="date" class="form-control" id="e_start_date" >
          </div>
        </div>

        <div class="form-group row">
          <label for="e_end_date" class="col-sm-2 col-form-label">End Date</label>
          <div class= "col-md-6">
            <input type="date" class="form-control" id="e_end_date" >
          </div>
        </div>

        <div class="form-group row">
          <label for="e_postion" class="col-sm-2 col-form-label">Position</label>
          <div class= "col-md-6">
            <input type="text" class="form-control" id="e_position">
          </div>
        </div>

        <div class="form-group row">
          <label for="e_description" class="col-sm-2 col-form-label">Job Description</label>
          <div class= "col-md-6">
            <textarea class="form-control" id="e_description" rows="3"></textarea>
            <div class="small">max. 200 words</div>
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
