<?php

//Connection to database
$open_conn = mysqli_connect('127.0.0.1', 'root' , '', 'WebApps');
if(!$open_conn)
{
	echo("Connection Failed!");
}
else
{
    
    $name = array(
    "GOOG" => "Google",
    "YHOO" => "Yahoo!",
    "MSFT" => "Microsoft",
    "INTC" => "Intel",
    "ERIC" => "Ericsson",
    "MAT" => "Mattel",
    "CSCO" => "Cisco",
    "AMZN" => "Amazon",
    "FB" => "Facebook",
    "AAPL" => "Apple",
);
    
    $company =  isset($_POST['company'])       ? htmlspecialchars(trim($_POST['company']))      : null;
    $level = isset($_POST['level'])       ? htmlspecialchars(trim($_POST['level']))      : null;
    $timeslot =  isset($_POST['timeslot'])       ? htmlspecialchars(trim($_POST['timeslot']))      : null;
    
    $query = "SELECT ";
    
    if($level == "highest")
    {
        $query .= "MAX(close) as result FROM ";
    }
    else if($level == "lowest")
    {
        $query .= "MIN(close) as result FROM ";
    }
    else
    {
        $query .= "AVG(close) as result FROM ";
    }
    
    
    
    if($timeslot == "ten days")
    {
        $query .= "ten_days ";
    }
    else
    {
        $query .= "historical_new ";
    }
    
    $query .= "WHERE name = '".$company."'";
    
    //echo $query;
    
    $result = mysqli_query($open_conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    echo "The ".$level." price value for past ".$timeslot." for ".$name[$company]." is ".$row['result'].".";
    
    
}

?>
