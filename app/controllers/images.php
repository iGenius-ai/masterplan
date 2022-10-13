<?php

  include(ROOT_PATH . "/app/helpers/validatePic.php");

  $table = 'images';

  $years = selectAll('gallery');
  $images = selectAll($table);

  $errors = array();

  $id = "";
  $title = "";
  $image = "";
  $year_id = "";
  $description = "";

  if (isset($_GET['id'])) {
    $img = selectOne($table, ['id' => $_GET['id']]);

    $id = $img['id'];
    $title = $img['title'];
    $image = $img['image'];
    $description = $img['description'];
  }

  if (isset($_POST['add_img'])) {
    adminOnly();
    $errors = validatePic($_POST);

    if (!empty($_FILES['image']['name'])) {
      $image_name = time() . '_' . $_FILES['image']['name'];
      $destination = ROOT_PATH . "/assets/uploads/" . $image_name;
      $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

      if ($result) {
        $_POST['image'] = $image_name;
      } else {
        array_push($errors, "Failed to upload image");
      }
    } else {
      array_push($errors, "Post image required");
    }
    if (count($errors) == 0) {
      unset($_POST['add_img']);
    
      $img_id = create($table, $_POST);
      $_SESSION['message'] = "Post created successfully";
      $_SESSION['type'] = "success";
      header("location: " . BASE_URL . "admin/views/images/index.php");
      exit();
    } else {
      $title = $_POST['title'];
      $year_id = $_POST['year_id'];
      $description = $_POST['description'];
    }
  }

  if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = 'Image deleted';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . 'admin/views/images/index.php'); 
    exit();
  }

?>