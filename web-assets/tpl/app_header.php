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

  <link rel="shortcut icon" href="/favicon.ico">
</head>
<body>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/job_app/web-assets/tpl/app_nav.php"; ?>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/job_app/web-assets/lib/db.php"; ?>
