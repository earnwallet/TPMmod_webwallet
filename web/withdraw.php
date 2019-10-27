<?php include('server.php') ?>
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
  <title>TheProfitMachine web interface</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Withdraw</h2>
  </div>
	<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
      <p>Welcome <strong><?php echo explode(PHP_EOL,shell_exec("whoami"))[0]; ?></strong></p>
        <p>Balance: <?php echo explode(PHP_EOL,shell_exec("dogecoin-cli getbalance"))[0]; ?></p>
</div>
  <form method="post" action="makewithdraw.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Address</label>
  		<input type="text" name="address" >
  	</div>
  	<div class="input-group">
  		<label>Amount</label>
  		<input type="text" name="amount">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="withdraw">Withdraw</button>
  	</div>
  		<p> <a href="/index.php" style="color: red;">Home</a> </p>
  </form>
</body>
</html>