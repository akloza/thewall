<?php session_start();
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Ninja Gold Game</title>
 	<link rel="stylesheet" type="text/css" href="ninja_gold.css">
 </head>
 <body>

 	<div class="container">
 <?php if(isset($_SESSION['error']))
{ ?>
	<div class="error">
<?php		foreach($_SESSION['error'] as $name => $message)
	{?>
		<p><?= $message; ?></p>
	<?php }	?>
		</div>
	<?php } ?>

	<div class="gold">
		<span>Your Gold:</span>
		<input type="text" name="your-gold" value="<?php echo isset($_SESSION['gold_count'])? $_SESSION['gold_count']: ''?>
		" disabled>
	</div>
	<div class="restart">
		<form id="restart-form" action="ninja_gold_process.php" method="post">
			<input type="hidden" name="action" value="restart_form"/>
			<input type="submit" value-"Start Over">
		</form>
	</div>

	<div class="clear"></div>
	<div class="location">
		<h3>Farm</h3>
		<p>(earns 10-20 golds)</p>
		<form action="ninja_gold_process.php" method="post">
			<input type="hidden" name="location" value="farm"/>
			<input type="submit" value="Find Gold!"/>
		</form>
	</div>

	<div class="location">
		<h3>Cave</h3>
		<p>(earns 5-10 golds)</p>
		<form action="ninja_gold_process.php" method="post">
			<input type="hidden" name="location" value="cave"/>
			<input type="submit" value="Find Gold!"/>
		</form>
	</div>

	<div class="location">
		<h3>House</h3>
		<p>(earns 2-5 golds)</p>
		<form action="ninja_gold_process.php" method="post">
			<input type="hidden" name="location" value="house"/>
			<input type="submit" value="Find Gold!"/>
		</form>	
	</div>

	<div class="location">​
		<h3>Casino!</h3>​
		<p>(earns/takes 0-50 golds)</p>​
		<form action="ninja_gold_process.php" method="post">​
			<input type="hidden" name="location" value="casino"/>​
			<input type="submit" value="Find Gold!"/>​
		</form>​
	</div>​

	<div class="clear"></div>
	<div class="log_entry">
		<span>Activities:</span>
		<div id="log"><?php echo isset($_SESSION['activity']) ? implode('', array_reverse($_SESSION['activity'])) : '';?></div>

	</div>
</div>

 </body>
 </html>