<?php
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"duhtuhbaess");
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://use.typekit.net/phx0aia.css">
<title>An SQL Test.</title>
</head>
<body>
	<h1>ORDER!!!!!!!!!!<br>
	SAPE NAK TAIK</h1>
	<div class="form">
		<form method="post" action="order.php">
			<label>Model:</label>
			<input type="text" id="model" name="model" maxlength="50" placeholder="Model">
			<br>	
			<label>Quantity:</label>
			<input type="number" id="quantity" name="quantity" maxlength="4" placeholder="Quantity">
			<br>
			<label>Price:</label>
			<input type="number" id="price" name="price" maxlength="10" placeholder="Price" step=".01">
			<br>
			<label>ID:</label>
			<input type="number" id="id" name="id" maxlength="5" placeholder="ID">
			<br>
			<input name="subby-ordar" type="submit" value="Submit">
			<button type="button" onClick="window.location.href='order-report.php'">Purchase Report</button>
			<button type="button" onClick="window.location.href='index.php'">Go Back</button>
		</form>
		<?php
		if(isset($_POST["subby-ordar"]))
		{
			$model=$_POST["model"];
			$quants=$_POST["quantity"];
			$price=$_POST["price"];
			$aidi=$_POST["id"];
			$date="select getdate()";
			
			$query="insert into perches values ('','$model','$quants','$price','$aidi','$date')";
			$query_run=mysqli_query($con,$query);
			if($query_run)
			{
				echo "<script type='text/javascript'>
				alert ('YOOOOOOOOOOOO'+'\\n'+'WE GOTCHA ORDER YEAH')
				</script>";
			}
				else
				{
					echo "<script type='text/javascript'>
				alert ('SUCC')
				</script>";
				}
		}
		?>
	</div>
</body>
</html>
