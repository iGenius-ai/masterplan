<?php

  include(ROOT_PATH . "/app/helpers/validateImg.php");

  $table = "gallery";
  $years = selectAll($table);

  $errors = array();

  $id = "";
  $year_name = "";
  $description = "";

  // Add image
  if (isset($_POST['add_imgYear'])) {
    $errors = validateImg($_POST);

    if (count($errors) === 0) {
      unset($_POST['add_imgYear']);
      $year_id = create($table, $_POST);
      $_SESSION['message'] = 'Topic created successfully';
      $_SESSION['type'] = 'success';
      header('location: ' . BASE_URL . 'admin/views/gallery/index.php');
      exit(); 
    } else {
      $year_name = $_POST['year_name'];
      $description = $_POST['description'];
    }
  }

  if (isset($_GET['id'])) {
    $year = selectOne($table, ['id' => $_GET['id']]);
    
    $id = $year['id'];
    $year_name = $year['year_name'];
    $description = $year['description'];
  }

  if (isset($_POST['edit_imgYear'])) {
    // adminOnly();
    $errors = validateImg($_POST);

    if (count($errors) === 0) { 
      $id = $_POST['id'];
      unset($_POST['edit_imgYear'], $_POST['id']);
      $year_id = update($table, $id, $_POST);
      $_SESSION['message'] = 'Category updated successfully';
      $_SESSION['type'] = 'success';
      header('location: ' . BASE_URL . 'admin/views/gallery/index.php');
      exit();
    } else {
      $id = $_POST['id'];
      $year_name = $_POST['year_name'];
      $description = $_POST['description'];
    }
  }

  if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = 'Admin user deleted';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . 'admin/views/gallery/index.php'); 
    exit();
  }

?>