<?php

  include(ROOT_PATH . "/app/helpers/validateUser.php");
  include(ROOT_PATH . "/app/helpers/editUser.php");

  $table = "users";
  $users = selectAll($table);

  $errors = array();

  $id = "";
  $full_name = "";
  $nin = "";
  $dob = "";
  $password = "";
  $c_password = "";
  $admin = "";
  $gender = "";
  $m_status = "";
  $disabled = "";
  $email = "";
  $phone = "";
  $address = "";
  $nationality = "";
  $s_origin = "";
  $lga = "";
  $program = "";
  $p_name = "";
  $p_mobile = "";
  $p_nin = "";
  $one_uni = "";
  $course1 = "";
  $two_uni = "";
  $course2 = "";
  $three_uni = "";
  $course3 = "";
  $image = "";
  $subject1 = "";
  $subject2 = "";
  $subject3 = "";
  $subject4 = "";
  $waec1 = "";
  $grade1 = "";
  $waec2 = "";
  $grade2 = "";
  $waec3 = "";
  $grade3 = "";
  $waec4 = "";
  $grade4 = "";
  $waec5 = "";
  $grade5 = "";
  $waec6 = "";
  $grade6 = "";
  $waec7 = "";
  $grade7 = "";
  $waec8 = "";
  $grade8 = "";
  $waec9 = "";
  $grade9 = "";

  function userLogin($user)
  {
    $_SESSION["id"] = $user["id"];
    $_SESSION["full_name"] = $user["full_name"];
    $_SESSION["nin"] = $user["nin"];
    $_SESSION["dob"] = $user["dob"];
    $_SESSION["gender"] = $user["gender"];
    $_SESSION["admin"] = $user["admin"];
    $_SESSION["m_status"] = $user["m_status"];
    $_SESSION["disabled"] = $user["disabled"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["phone"] = $user["phone"];
    $_SESSION["address"] = $user["address"];
    $_SESSION["nationality"] = $user["nationality"];
    $_SESSION["s_origin"] = $user["s_origin"];
    $_SESSION["lga"] = $user["lga"];
    $_SESSION["program"] = $user["program"];
    $_SESSION["p_name"] = $user["p_name"];
    $_SESSION["p_mobile"] = $user["p_mobile"];
    $_SESSION["p_nin"] = $user["p_nin"];
    $_SESSION["one_uni"] = $user["one_uni"];
    $_SESSION["course1"] = $user["course1"];
    $_SESSION["two_uni"] = $user["two_uni"];
    $_SESSION["course2"] = $user["course2"];
    $_SESSION["three_uni"] = $user["three_uni"];
    $_SESSION["course3"] = $user["course3"];
    $_SESSION["image"] = $user["image"];
    $_SESSION["subject1"] = $user["subject1"];
    $_SESSION["subject2"] = $user["subject2"];
    $_SESSION["subject3"] = $user["subject3"];
    $_SESSION["subject4"] = $user["subject4"];
    $_SESSION["waec1"] = $user["waec1"];
    $_SESSION["grade1"] = $user["grade1"];
    $_SESSION["waec2"] = $user["waec2"];
    $_SESSION["grade2"] = $user["grade2"];
    $_SESSION["waec3"] = $user["waec3"];
    $_SESSION["grade3"] = $user["grade3"];
    $_SESSION["waec4"] = $user["waec4"];
    $_SESSION["grade4"] = $user["grade4"];
    $_SESSION["waec5"] = $user["waec5"];
    $_SESSION["grade5"] = $user["grade5"];
    $_SESSION["waec6"] = $user["waec6"];
    $_SESSION["grade6"] = $user["grade6"];
    $_SESSION["waec7"] = $user["waec7"];
    $_SESSION["grade7"] = $user["grade7"];
    $_SESSION["waec8"] = $user["waec8"];
    $_SESSION["grade8"] = $user["grade8"];
    $_SESSION["waec9"] = $user["waec9"];
    $_SESSION["grade9"] = $user["grade9"];

    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';

    if ($_SESSION["admin"]) {
      header("location: " . BASE_URL . "admin/index.php");
    } else {
      header("location: " . BASE_URL . "st/profile.php");
    }      
    exit();
  }

  if (isset($_POST['register-btn'])) {
    $errors = validateUser($_POST);

    if (!empty($_FILES['image']['name'])) {
      $image_name = time() . '_' . $_FILES['image']['name'];
      $destination = (ROOT_PATH . "/assets/uploads/" . $image_name);

      $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

      if ($result) {
         $_POST['image'] = $image_name;
      } else {
        array_push($errors, "Failed to upload image");
      }
    } else {
      array_push($errors, "Passport is compulsory.");
    }

    if (count($errors) === 0) {
      unset($_POST['register-btn'], $_POST['c_password']);
      $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
      if (isset($_POST['admin'])) {
        $_POST['admin'] = 1;
        $user_id = create($table, $_POST);
        $_SESSION['message'] = 'Admin user created';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . 'admin/index.php'); 
        exit();
      } else {
        $_POST['admin'] = 0;
        $user_id = create($table, $_POST);
        $user = selectOne($table, ['id' => $user_id]);
        userLogin($user);
      } 
    } else {
      $full_name = $_POST['full_name'];
      $nin = $_POST['nin'];
      $dob = $_POST['dob'];
      $admin = isset($_POST['admin']) ? 1 : 0;
      $gender = $_POST['gender'];
      $m_status = $_POST['m_status'];
      $disabled = $_POST['disabled'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $nationality = $_POST['nationality'];
      $s_origin = $_POST['s_origin'];
      // $lga = $_POST['lga'];
      $program = $_POST['program'];
      $one_uni = $_POST['one_uni'];
      $course1 = $_POST['course1'];
      $two_uni = $_POST['two_uni'];
      $course2 = $_POST['course2'];
      $three_uni = $_POST['three_uni'];
      $course3 = $_POST['course3'];
      // $image = $_POST['image'];
      $subject1 = $_POST['subject1'];
      $subject2 = $_POST['subject2'];
      $subject3 = $_POST['subject3'];
      $subject4 = $_POST['subject4'];
      $waec1 = $_POST['waec1'];
      $grade1 = $_POST['grade1'];
      $waec2 = $_POST['waec2'];
      $grade2 = $_POST['grade2'];
      $waec3 = $_POST['waec3'];
      $grade3 = $_POST['grade3'];
      $waec4 = $_POST['waec4'];
      $grade4 = $_POST['grade4'];
      $waec5 = $_POST['waec5'];
      $grade5 = $_POST['grade5'];
      $waec6 = $_POST['waec6'];
      $grade6 = $_POST['grade6'];
      $waec7 = $_POST['waec7'];
      $grade7 = $_POST['grade7'];
      $waec8 = $_POST['waec8'];
      $grade8 = $_POST['grade8'];
      $waec9 = $_POST['waec9'];
      $grade9 = $_POST['grade9'];
    }
  }

  if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);
    
    $id = $user['id'];
    $admin = $user['admin'];
    $dob = $user['dob'];
    $gender = $user['gender'];
    $m_status = $user['m_status'];
    $disabled = $user['disabled'];
    $dob = $user['dob'];
    $email = $user['email'];
    $phone = $user['phone'];
    $full_name = $user['full_name'];
    $nin = $user['nin'];
    $s_origin = $user['s_origin'];
    $nationality = $user['nationality'];
    $address = $user['address'];
    $lga = $user['lga'];
    $p_name = $user['p_name'];
    $p_mobile = $user['p_mobile'];
    $p_nin = $user['p_nin'];
    $program = $user['program'];
    $one_uni = $user['one_uni'];
    $course1 = $user['course1'];
    $two_uni = $user['two_uni'];
    $course2 = $user['course2'];
    $three_uni = $user['three_uni'];
    $course3 = $user['course3'];
    $subject1 = $user['subject1'];
    $subject2 = $user['subject2'];
    $subject3 = $user['subject3'];
    $subject4 = $user['subject4'];
    $waec1 = $user['waec1'];
    $grade1 = $user['grade1'];
    $waec2 = $user['waec2'];
    $grade2 = $user['grade2'];
    $waec3 = $user['waec3'];
    $grade3 = $user['grade3'];
    $waec4 = $user['waec4'];
    $grade4 = $user['grade4'];
    $waec5 = $user['waec5'];
    $grade5 = $user['grade5'];
    $waec6 = $user['waec6'];
    $grade6 = $user['grade6'];
    $waec7 = $user['waec7'];
    $grade7 = $user['grade7'];
    $waec8 = $user['waec8'];
    $grade8 = $user['grade8'];
    $waec9 = $user['waec9'];
    $grade9 = $user['grade9'];
  }

  if (isset($_POST['update-btn'])) {
    // adminOnly();
    $errors = editUser($_POST);

    if (count($errors) === 0) {
      $id = $_POST['id'];
      unset($_POST['update-btn'], $_POST['id']);
        
      $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
      $count = update($table, $id, $_POST);
      $_SESSION['message'] = 'Student details updated';
      $_SESSION['type'] = 'success';
      header('location: ' . BASE_URL . 'admin/views/users/index.php'); 
      exit();        
    } else {
      $full_name = $_POST['full_name'];
      $nin = $_POST['nin'];
      $admin = isset($_POST['admin']) ? 1 : 0;
    }
  }

  if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
      $user = selectOne($table, ['full_name' => $_POST['full_name']]);

      if ($user && password_verify($_POST['password'], $user['password'])) {
        userLogin($user);
      } else {
        array_push($errors, 'Full Name or Password is incorrect');
      }
    }
    $full_name = $_POST['full_name'];
    $password = $_POST['password'];
  }

  if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = 'Admin user deleted';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . 'admin/index.php'); 
    exit();
  }

?>