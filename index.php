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
	<h1>SOME BORING<br>
	FILTHY FORM</h1>
	<div class="form">
		<form method="post" action="index.php">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" maxlength="50" placeholder="Name">
			<br>	
			<label for="class">Class:</label>
			<input type="text" id="class" name="class" maxlength="3" placeholder="Class">
			<br>
			<label for="age">Age:</label>
			<input type="number" id="age" name="age" maxlength="2" placeholder="Age">
			<br>
			<label for="phone">Phone No.:</label>
			<input type="number" id="phone" name="phone" maxlength="10" placeholder="Phone Number">
			<br>
			<input name="subby" type="submit" value="Submit">
			<button type="button" onClick="window.location.href='report.php'">Report</button>
			<button type="button" onClick="window.location.href='order.php'">Order</button>
		</form>
		<?php
		if(isset($_POST["subby"]))
		{
			$name=$_POST["name"];
			$class=$_POST["class"];
			$age=$_POST["age"];
			$phone=$_POST["phone"];

			$query="insert into kawankawan values ('','$name','$class','$age','$phone')";
			$query_run=mysqli_query($con,$query);
			if($query_run)
			{
				echo "<script type='text/javascript'>
				alert ('WARNING: YOU HAVE BEEN INFECTED WITH A VIRUS'+'\\n'+'PLEASE CALL 911 FOR TECHNICAL SUPPORT')
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
