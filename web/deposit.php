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
	<title>Wallet</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2><?php echo explode(PHP_EOL,shell_exec("whoami"))[0]; ?>'s wallet!</h2>
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
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo explode(PHP_EOL,shell_exec("whoami"))[0]; ?></strong></p>
        <?php  
        $depoadd = explode(PHP_EOL,shell_exec("dogecoin-cli getnewaddress"))[0];
        ?>
        <p>Deposit address: <?php echo $depoadd ?></p>
        <img src="/qr.php?qr=<?php echo $depoadd; ?>" />
        <p> <a href="/deposit.php" style="color: red;">Deposit</a> </p>
        <p> <a href="/withdraw.php" style="color :red;">Withdraw</a> </p>
        <p> <a href="/index.php" style="color: red;">Home</a> </p>
    	<p> <a href="/index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>
