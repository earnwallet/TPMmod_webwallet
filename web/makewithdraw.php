<?php 
  session_start(); 
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
  <h2>Processing withdrawal...!</h2>
</div>
<div class="content">
  <p><?php print_r($_POST); ?></p>
  <?php
    $address = $_POST['address'];
    $amount  = $_POST['amount'];
    $tx      = explode(PHP_EOL, shell_exec("dogecoin-cli sendtoaddress $address $amount"))[0];
    $message = "Sent $amount DOGE to $address<br />TXID:$tx";
  ?>
  <?php $_SESSION['success'] = "$message"; 
  header("location: index.php");
  ?>
</div>