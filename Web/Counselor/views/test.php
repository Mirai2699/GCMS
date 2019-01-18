<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
	<form method="POST" action="" name="form1">
		<?php
			$link = mysqli_connect("localhost","root","","db")
			$res = mysqli_query($link, "select*from table1");
			echo"<table>";
			while($row = mysqli_fetch_array($res))
			{
				echo "<tr>";
				echo "<td>";
				echo'<input type="checkbox" name="num[]" class="other" value="<?php echo $row["id"]; ?>"/>'; 
			    echo "</td>"; 

				echo "<td>"; echo $row["id"]; echo "</td>";
				echo "<td>"; echo $row["id"]; echo "</td>";
				echo "<td>"; echo $row["id"]; echo "</td>";
				echo "</tr>"; 
			}
			echo"</table>";
		?>
		<input type="submit" name="submit" value="">
	</form>

	<?php
		if(isset($_POST["submit1"]))
		{
			$box = $_POST['num'];
			while (list ($key, $val)) = @each($box))
			{
				mysqli_query($link, "delete from table where id=$val;")
			}
		}
	?>

</body>
</html>>