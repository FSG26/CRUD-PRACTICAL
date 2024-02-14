<?php

	$obj = new mysqli("localhost","root","","test2");

	if($obj->connect_errno !=0)
	{
		echo "$obj->connect_error";
		exit;
	}

	//pagination Start
	$page_no = isset($_GET['page_no']) ? $_GET['page_no'] :1;
	$total_record_per_page = 2;
	$offset = ($page_no - 1) * $total_record_per_page;

	$result_count = $obj->query("SELECT count(*) as total_records FROM product");
	$total_records = $result_count->fetch_object()->total_records;
	$total_no_of_pages = ceil($total_records / $total_record_per_page);


	$resut = $obj->query("SELECT * FROM product LIMIT $offset, $total_record_per_page");


	
?>

<table align="center" border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>id</th>
		<th>category</th>
		<th>product</th>
	</tr>
	<?php while($row = $resut->fetch_object()){ ?>
	<tr>
		<td><?php echo $row->id; ?></td>
		<td><?php echo $row->category_name; ?></td>
		<td><?php echo $row->products; ?></td>
	</tr>
<?php } 

	echo "Page $page_no of $total_no_of_pages<br>";

	echo "<ul>";
	if($page_no > 1){
		$previous_page = $page_no - 1;
		echo "<li><a href='?page_no=$previous_page'>previous_page</a></li>";
	}
for ($i=1; $i <=$total_no_of_pages ; $i++) { 
	echo "<li><a href='?page_no=$i'>$i</a></li>";
}


if($page_no < $total_no_of_pages)
{
	$next_page = $page_no +1;
	echo "<li><a href='?page_no=$next_page'>next_page</a></li>";
}

?>
</table>
