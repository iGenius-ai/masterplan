<?php

  function validateUser($user)
  {
    $errors = array();

    if (empty($user['full_name'])) {
      array_push($errors, 'Full name is required');
    }
    if (empty($user['email'])) {
      array_push($errors, 'Email is required');
    }
    if (empty($user['password'])) {
      array_push($errors, 'Password is required');
    }
    if ($user['c_password'] !== $user['password']) {
      array_push($errors, 'Passwords do not match');
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

  function validateWaecUser($waec_user)
  {
    $errors = array();

    if (empty($waec_user['full_name'])) {
      array_push($errors, 'Full name is required');
    }
    if (empty($waec_user['email'])) {
      array_push($errors, 'Email is required');
    }
    if (empty($waec_user['password'])) {
      array_push($errors, 'Password is required');
    }
    if ($waec_user['c_password'] !== $waec_user['password']) {
      array_push($errors, 'Passwords do not match');
    }

    $existingWaecUser = selectOne('waec_users', ['email' => $waec_user['email']]);
    if ($existingWaecUser) {
      if (isset($waec_user['create-admin']) || isset($waec_user['register-waec'])) {
        array_push($errors, 'Email already exists');
      }
    } else {
      $existingWaecUser2 = selectOne('waec_users', ['nin' => $waec_user['nin']]);
      if ($existingWaecUser2) {
        if (isset($waec_user['create-admin']) || isset($waec_user['register-waec'])) {
          array_push($errors, 'NIN already exists');
        }
      }
    }
    return $errors;
  }

  function validateLogin($user)
  {
    $errors = array();

    if (empty($user['full_name'])) {
      array_push($errors, 'Full name is required');
    }
    if (empty($user['password'])) {
      array_push($errors, 'Password is required');
    }

    return $errors;
  }

  function validateWaecLogin($waec_user)
  {
    $errors = array();

    if (empty($waec_user['full_name'])) {
      array_push($errors, 'Full name is required');
    }
    if (empty($waec_user['password'])) {
      array_push($errors, 'Password is required');
    }
    return $errors;
  }

?>