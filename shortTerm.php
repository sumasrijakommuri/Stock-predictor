<?php
session_start();

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

$cmd = "python -W ignore Bayesian.py ".$company;
exec("$cmd",$output);
     $day = date("m-d-y");

$result = implode(" ",$output);
    
    $historyquery = "INSERT into ".$_SESSION['username']." values('".$name[$company]."','Short Term','".$output[1]."','".$day."')";
    mysqli_query($open_conn,$historyquery) or die(mysqli_error($open_conn));

echo $result;

}
?>
