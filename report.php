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
	<h1>REPORT REPORT<br>YU GOBLOK</h1>
	<div class="form">
		<form method="post" action="report.php">
			<label for="class">Class:</label>
			<select name="class" id="class">
                <option value="pls" selected="selected">Select pls</option>
                <?php
                $query1="select distinct class from kawankawan order by class ASC";
                $result1=mysqli_query($con, $query1);
                $menu1="";
                while($row=mysqli_fetch_array($result1))
                {
                    $menu1 .= "<option value=".$row['class'].">".$row['class']."</option>";
                }
                echo $menu1;
		        ?>
            </select>
			<br>
			<input name="ripot-subby" type="submit" value="Submit">
            <button type="button" onClick="window.location.href='index.php'">Go Back</button>
            <br>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Age</th>
                    <th>Phone</th>
                </tr>
                <?php
                    if(isset($_POST["ripot-subby"]))
                    {
                        $class=$_POST["class"];
                        $query2="select * from kawankawan WHERE kawankawan.class='$class' order by NAME ASC";
                        $result2=mysqli_query($con,$query2);
                        while($row2=mysqli_fetch_array($result2))
                        {
                            $a=$row2['ID'];
                            $b=$row2['name'];
                            $c=$row2['class'];
                            $d=$row2['age'];
                            $e=$row2['phone'];
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