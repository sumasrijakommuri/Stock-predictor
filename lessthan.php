<?php
    $open_conn = mysqli_connect('127.0.0.1', 'root' , '', 'WebApps');
if(!$open_conn)
{
	echo("Connection Failed!");
}
else
{
    
    $stock_ids = explode(",","GOOG,YHOO,MSFT,INTC,ERIC,MAT,CSCO,AMZN,FB,AAPL");
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
    
    $result_ids = array();
    
    
    $compare = isset($_POST['compare'])       ? htmlspecialchars(trim($_POST['compare']))      : null;
    
    $query = "SELECT min(close) as result FROM historical WHERE name = '".$compare."'";
    $output = mysqli_query($open_conn, $query);
    $row =  mysqli_fetch_array($output, MYSQLI_ASSOC);
    
    foreach($stock_ids as $id)
    {
        $getAvg = "SELECT avg(close) as result FROM historical WHERE name = '".$id."'";
        $result = mysqli_query($open_conn, $getAvg);
        $rowAvg = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if($rowAvg['result'] < $row['result'])
        {
            $result_ids[] = $id;
        }
    }
    
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo " </tr>";
   
    
    foreach($result_ids as $id)
    {
       echo "<tr>";
       echo "<td>$id</td>";
       echo "<td>$name[$id]</td> ";
       echo "</tr>";
    }
    
    echo "</table>";
    
}
?>
