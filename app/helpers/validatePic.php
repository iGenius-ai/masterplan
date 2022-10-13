<?php

  function validatePic($img)
  {
    $errors = array();

    if (empty($img['title'])) {
      array_push($errors, 'Title is required');
    }
    if (empty($img['year_id'])) {
      array_push($errors, 'Category is required');
    }
    if (empty($img['description'])) {
      array_push($errors, 'Please describe your image');
    }
    return $errors;
  }

?>