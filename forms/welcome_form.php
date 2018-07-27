<?php $page_title = "Welcome";
  if (!isset($dbh)) {
    include $_SERVER['DOCUMENT_ROOT'] . '/job_app/web-assets/tpl/app_header.php';
  }
?>
<h1><?php echo $page_title ?></h1>

<form id="welcome" method="post" action="/job_app/" class="needs-validation" novalidate>

  <div class="card border-info">
    <div class="card-header">Start Here</div>
    <div class="card-body">
<div class="alert alert-primary">Please enter your email to begin or continue an existing application</div>
      <div class="form-group">
        <label for="email_id" class="col-sm-2 col-form-label">Email</label>
        <div class= "col-md-6">
          <input type="email" class="form-control" id="email_id" name="email_id" required>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-6">
          <input type="hidden" name="action" value="welcome">
          <button type="submit" class="btn btn-lg btn-success">Continue</button>
        </div>
      </div>

    </div>
  </div>
</form>
