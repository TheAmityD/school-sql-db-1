<?php
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"duhtuhbaess");
?>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://use.typekit.net/phx0aia.css">
<title>An SQL Report.</title>
</head>
<body>
	<h1>NAK ORDER<br>TAPI LUPA</h1>
	<div class="form">
		<form method="post" action="order-report.php">
			<label>Model:</label>
			<select name="model" id="model">
                <option value="pls" selected="selected">Select pls</option>
                <?php
                $query1="select distinct model from perches order by model ASC";
                $result1=mysqli_query($con, $query1);
                $menu1="";
                while($row=mysqli_fetch_array($result1))
                {
                    $menu1 .= "<option value=".$row['model'].">".$row['model']."</option>";
                }
                echo $menu1;
		        ?>
            </select>
			<br>
			<input name="ripot-subby" type="submit" value="Submit">
            <button type="button" onClick="window.location.href='order.php'">Go Back</button>
            <br>
            <table border="1">
                <tr>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Model</th>
                    <th>Quantity</th>
                    <th>Price of Each</th>
                    <th>Total Price</th>
                    <th>Date</th>
                </tr>
                <?php
                    if(isset($_POST["ripot-subby"]))
                    {
                        $model=$_POST["model"];                        
                        /* $query2="select * from perches WHERE model='$model' order by model ASC";
                        $memberid="select ID from kawankawan order by ID asc";
                        $perchesid="select ID from perches order by ID asc";
                        $name="select name from kawankawan where ID='$perchesid'";
                        $class="select class from kawankawan where ID='$perchesid'";
                        $price="select price from perches where model='$model' and id='$memberid'"; */
                        $query2="select kawankawan.name, kawankawan.class, perches.model, perches.date, perches.quantity, perches.price, sum(quantity*price) as 'totalprice' from perches inner join kawankawan on perches.id=kawankawan.id where perches.model='$model' group by kawankawan.name asc"; 
                        $result2=mysqli_query($con,$query2);
                        while($row2=mysqli_fetch_array($result2))
                        {
                            $a=$row2['name'];
                            $b=$row2['class'];
                            $d=$row2['model'];
                            $e=$row2['quantity'];
                            $c=$row2['price'];
                            $f=$row2['totalprice'];
                            $g=$row2['date']
                    ?>
                            <tr>
                                <td><?php echo $a; ?></td>
                                <td><?php echo $b; ?></td>
                                <td><?php echo $d; ?></td>
                                <td><?php echo $e; ?></td>
                                <td><?php echo $c; ?></td>
                                <td><?php echo $f; ?></td>
                                <td><?php echo $g; ?></td>
                            </tr>
                        <?php }
                    }
                ?> 
            </table>
		</form>
	</div>
</body>
</html>