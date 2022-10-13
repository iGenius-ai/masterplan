<?php
  function validateImg($year)
  {
    $errors = array();

    if (empty($year['year_name'])) {
      array_push($errors, 'Category is required');
    }
    if (empty($year['description'])) {
      array_push($errors, 'Description is required');
    }

    return $errors;
  }
?>