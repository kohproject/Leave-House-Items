<?php

    $to = "sonnykoh@sonnykoh.com";
    $ip = $_SERVER['REMOTE_ADDR'];
    $subject = "leaveWish =" . $ip;
    $message = $_POST['mess'];
    $from = "buyer";
    $headers = "From:" . $from;

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Wish list sent!')</script>";
        echo "Wish list sent! Thank you";
    }
    else {
        echo "failed -- sorry try again";
    }

?>