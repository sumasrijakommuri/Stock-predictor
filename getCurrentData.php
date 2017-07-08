<html>

<head>
    <meta http-equiv="refresh" content=60>
</head>

</html>

<?php

//Connection to database
$open_conn = mysqli_connect('127.0.0.1', 'root' , '', 'WebApps');
if(!$open_conn)
{
	echo("Connection Failed!");
}
else
{
echo "Connection Successful!</br>";

$stock_ids = explode(",","GOOG,YHOO,MSFT,INTC,ERIC,MAT,CSCO,AMZN,FB,AAPL");

//iterating through stocks
foreach($stock_ids as $id)
{

$get_data = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=".$id."&f=sd1t1abophgv&e=.csv");
	//Copying data to csv file
	
	$data = str_replace("N/A","null",$get_data);
	$values = str_replace(chr(145),"'",$data);
	
	$tuple = explode(",",$get_data);
	
	//Formatting time
	$tuple[2] = str_replace("am","",$tuple[2]);
	$tuple[2] = str_replace("pm","",$tuple[2]);
	$tuple[2] = str_replace("\"","",$tuple[2]);
	
	//formatting date
	$date = $tuple[1];
	$date = substr($date,1,-1);
	$date_array = explode("/",$date);
	$month = $date_array[0];
	$day = $date_array[1];
	$year = $date_array[2];
	$new_date = "$year-$month-$day";
	$tuple[1] = $new_date;
	
	$insert_query = "insert into current values ('$tuple[0]','$tuple[1]','$tuple[2]','$tuple[3]','$tuple[4]','$tuple[9]');";
	
	mysqli_query($open_conn,$insert_query) or die(mysqli_error($open_conn));
	
	echo ($id." current Stocks entered.</br>");

}

echo "</br>Fetch Completed!</br>";

}
?>
