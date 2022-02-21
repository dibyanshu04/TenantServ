<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

$name = mysqli_real_escape_string($con, $_POST['name']);
$phone = $_POST['phone'];
$email = mysqli_real_escape_string($con, $_POST['email']);
$message = mysqli_real_escape_string($con, $_POST['message']);
$query =  "insert into tblcontact(name, phone, email, message, status) value('$name', $phone, '$email', '$message', 'unread')";
$result = mysqli_query($con, $query);

if ($result) {
    echo "<script>
alert('Thanks for sending message');
window.location.href='contact.php';
</script>";
} else
    echo "<script>
alert('Try Resending');
window.location.href='contact.php';
</script>";
