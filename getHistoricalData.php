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


//Input dates to get data
$start_date = explode('-',date("m-d-y", mktime(0,0,0,4,23,2016)));
$end_date = explode('-',date("m-d-y"));

echo("start date:".$start_date[0]."/".$start_date[1]."/".$start_date[2]."</br>" );

$stock_ids = explode(",","GOOG,YHOO,MSFT,INTC,ERIC,AMZN,CSCO,FB,MAT,AAPL");

//iterating through stocks
foreach($stock_ids as $id)
{

$get_data = "http://ichart.finance.yahoo.com/table.csv?s=".$id."&d=".$end_date[0]."&e=".$end_date[1].
			"&f=".$end_date[2]."&g=d&a=".$start_date[0]."&b=".$start_date[1]."&c=".$start_date[2].'&ignore=.csv';
	
	//Copying data to csv file
	
	$client = curl_init();
	$file_name = $id."_historical.csv";
	$fileopen = fopen($file_name, "w");
	curl_setopt($client,CURLOPT_URL, $get_data);
	curl_setopt($client, CURLOPT_FILE, $fileopen);
	curl_exec($client);
	curl_close($client);
	fclose($fileopen);
	
	//Storing data into database
	$entries = file($file_name);
	 for($i = 0; $i< sizeof($entries); $i++)
	 {
		 $line = trim($entries[$i]);
		 $elements = explode(",", $line);
		 $attributes = "'".$id."','".$elements[0]."','".$elements[1]."','".$elements[2]."','".$elements[3]."','".$elements[4]."','".$elements[5]."'";
		 $insert_query = "insert into historical(name,date,open,high,low,close,volume) values($attributes)";
		 mysqli_query($open_conn, $insert_query) or die(mysqli_error($open_conn));
	 }
	
	echo ($id."Stocks entered. </br>");

}

}
?>
