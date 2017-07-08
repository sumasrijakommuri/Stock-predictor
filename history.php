<?php
session_start();

$open_conn = mysqli_connect('127.0.0.1', 'root' , '', 'WebApps');
if(!$open_conn)
{
	echo("Connection Failed!");
}
else
{
    
    echo '<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <title>Stock Predictor</title>
    <meta name="description" content="Stock Predictor">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link href="tables.css" type="text/css" rel="stylesheet" media="all">


    <script src="js/jquery-2.2.3.min.js"></script>

</head>

<style>
    body {
        padding-top: 40px;
    }

</style>

<body data-spy="scroll" data-target="#my-navbar">


    <!-- Navbar -->

    <div id="tabs">';
        
            include_once "tabs.php";
    echo '
    </div>



    <br>

    <div class="container">
        <section>
            <div class="page-header" id="history">
                <h1 class="success">History</h1>
            </div>

        </section>
    </div>


    <div class="table" align="center" style="max-height: 500px; overflow:scroll; margin-top: 40px; margin:0 auto">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Company</th>
                    <th>Type</th>
                    <th>Prediction</th>
                </tr>
            </thead>'; $historyquery = "SELECT * FROM ".$_SESSION["username"]; $result = mysqli_query($open_conn,$historyquery); while($row = mysqli_fetch_array($result)) { $day = $row['date']; $company = $row['company']; $type = $row['type']; $prediction = $row['prediction']; echo "
            <tr>"; echo "
                <td>$day</td>"; echo "
                <td>$company</td>"; echo "
                <td>$type</td>"; echo "
                <td>$prediction</td>"; echo "</tr>"; } echo'


        </table>
    </div>

    <!-- Footer -->

    <div id="footer">';
        
        include_once  "footer.php";
        
  echo '  </div>

    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    </body>

    </html>
    '; } ?>
