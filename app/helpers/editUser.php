<?php

  function editUser($user)
  {
    $errors = array();

    if (empty($user['full_name'])) {
      array_push($errors, 'Full name is required');
    }
    if (empty($user['email'])) {
      array_push($errors, 'Email is required');
    }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
      if (isset($user['create-admin']) || isset($user['register-btn'])) {
        array_push($errors, 'Email already exists');
      }
    } else {
      $existingUser2 = selectOne('users', ['nin' => $user['nin']]);
      if ($existingUser2) {
        if (isset($user['create-admin']) || isset($user['register-btn'])) {
          array_push($errors, 'NIN already exists');
        }
      }
    }
    return $errors;
  }

  function editWaecUser($waec_user)
  {
    $errors = array();

    if (empty($waec_user['full_name'])) {
      array_push($errors, 'Full name is required');
    }
    if (empty($waec_user['email'])) {
      array_push($errors, 'Email is required');
    }

    $existingWaecUser = selectOne('users', ['email' => $waec_user['email']]);
    if ($existingWaecUser) {
      if (isset($waec_user['create-admin']) || isset($waec_user['register-btn'])) {
        array_push($errors, 'Email already exists');
      }
    } else {
      $existingWaecUser2 = selectOne('users', ['nin' => $waec_user['nin']]);
      if ($existingWaecUser2) {
        if (isset($waec_user['create-admin']) || isset($waec_user['register-btn'])) {
          array_push($errors, 'NIN already exists');
        }
      }
    }
    return $errors;
  }

?>