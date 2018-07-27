<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/job_app/welcome.php">Job App</a>
  <?php
    if (isset($_SESSION['email_id'])) {
      echo "<a href='/job_app/index.php?action=logout' class='btn btn-primary'>Logout</a>";
    }
  ?>
</nav>
<div class="container">
<br>
