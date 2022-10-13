<?php

  include("path.php");

  // Start the session
  session_start();

  unset($_SESSION['id']);
  unset($_SESSION['full_name']);
  unset($_SESSION['admin']);

  // Destroy session
  session_destroy();

  header('location: ' . BASE_URL . 'login.php');

?>