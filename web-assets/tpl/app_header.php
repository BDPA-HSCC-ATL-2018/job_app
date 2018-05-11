<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $page_title ?></title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/web-assets/css/bootstrap.min.css">
  <style>
    html {
      position: relative;
      min-height: 100%;
    }
    body {
      padding-top: 50px;
      margin-bottom: 80px;
    }
  </style>
</head>
<body>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/web-assets/tpl/app_nav.php"; ?>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php'; ?>
  <div class="container-fluid">
