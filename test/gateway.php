<?php

  $input = @file_get_contents("php://input");
  $event = json_decode($input);

  $status = $event->data->status;
  $reference = $event->data->reference;
  $amount = $event->data->amount;
  $fname = $event->data->customer->first_name;
  $lname = $event->data->customer->last_name;
  $fullName = $fname.' '.$lname;
  $paidAt = $event->data->paid_at;
  $cus_email = $event->data->customer->email;
  $check = $event->event;

  if ($check == 'charge.success') {
    include ('payDB.php');

    $stmt = $conn->prepare("INSERT INTO customer (status, reference, amount, fullname, paidAt, email) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $status, $reference, $amount, $fullName, $paidAt, $cus_email);
    $stmt->execute();
    $stmt->close();
    $conn->close();
  } else {
    echo ("Payment failed");
  }
  

?>