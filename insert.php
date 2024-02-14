<?php 
	
	$obj = new mysqli("localhost","root","","test2");

	if($obj->connect_errno !=0)
	{
		echo "$obj->connect_error";
		exit;
	}

	if(isset($_POST['submit']))
	{
		$cat_name  = $_POST['CategoryName'];
		$product  = $_POST['Products'];
		$count  = $_POST['CountProduct'];

		$exe = $obj->query("INSERT INTO category (`cat_name`, `products`, `count_product`) VALUES ('$cat_name','$product','$count')");

		if($exe)
		{
			echo "Data Inserted Successfully";
		}
		else
		{
			echo "Error In query";
		}
	}
	
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Category</title>
 </head>
 <body>
 	<form method="post">
 		<table align="center" border="1" cellpadding="10" cellspacing="0">
 			<tr>
 				<td>Category Name</td>
 				<td><input type="text" name="CategoryName"></td>
 			</tr>
 			<tr>
 				<td>Products</td>
 				<td><input type="text" name="Products"></td>
 			</tr>
 			<tr>
 				<td>Count Of Product</td>
 				<td><input type="text" name="CountProduct"></td>
 			</tr>
 			<tr>
 				<td colspan="2" align="center"><input type="submit" name="submit" value="submit"></td>
 			</tr>
 		</table>
 	</form>
 
 </body>
 </html>