<?php
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"duhtuhbaess");
?>
<html>
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
			<label>Order Number:</label>
			<select name="ordernum" id="ordernum">
                <option value="pls" selected="selected">Select pls</option>
                <?php
                $query1="select distinct ordernum from perches order by ordernum ASC";
                $result1=mysqli_query($con, $query1);
                $menu1="";
                while($row=mysqli_fetch_array($result1))
                {
                    $menu1 .= "<option value=".$row['ordernum'].">".$row['ordernum']."</option>";
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
                    <th>OrderNo</th>
                    <th>Model</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>ID</th>
                </tr>
                <?php
                    if(isset($_POST["ripot-subby"]))
                    {
                        $ordernum=$_POST["ordernum"];
                        $query2="select * from perches WHERE perches.ordernum='$ordernum' order by ordernum ASC";
                        $result2=mysqli_query($con,$query2);
                        while($row2=mysqli_fetch_array($result2))
                        {
                            $a=$row2['ordernum'];
                            $b=$row2['model'];
                            $c=$row2['quantity'];
                            $d=$row2['price'];
                            $e=$row2['id'];
                            ?>
                            <tr>
                                <td><?php echo $a; ?></td>
                                <td><?php echo $b; ?></td>
                                <td><?php echo $c; ?></td>
                                <td><?php echo $d; ?></td>
                                <td><?php echo $e; ?></td>
                            </tr>
                        <?php }
                    }
                ?>
            </table>
		</form>
	</div>
</body>
</html>