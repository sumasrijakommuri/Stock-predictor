<?php
$open_conn = mysqli_connect('127.0.0.1', 'root' , '', 'WebApps');
if(!$open_conn)
{
	echo("Connection Failed!");
}
else
{
    
    $companies = array(
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
    $name = 'GOOG';
    $name = isset($_POST['name'])       ? htmlspecialchars(trim($_POST['name']))      : null;
    
    $query = "SELECT date, close from historical_new where name = '".$name."'";
    
    $result = mysqli_query($open_conn, $query);
    
    $timeseriesdata = array();
    $i=0;
    
    while($row = mysqli_fetch_array($result))
    {
        $dates = explode("/",$row['date']);
        $timeseriesdata[$i][] = intval($dates[2]);
        $timeseriesdata[$i][] = intval($dates[0]);
        $timeseriesdata[$i][] = intval($dates[1]);
        $timeseriesdata[$i][] = floatval($row['close']);
        $i = $i +1;
    }
}
?>
    <!DOCTYPE html>
    <html lang="en">


    <head>

        <meta charset="utf-8">
        <title>Stock Predictor</title>
        <meta name="description" content="Stock Predictor">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="home.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

        <script src="js/jquery-2.2.3.min.js"></script>

    </head>

    <style>
        body {
            padding-top: 40px;
        }

    </style>

    <body data-spy="scroll" data-target="#my-navbar">


        <!-- Navbar -->

        <div id="tabs">
            <?php 
            include_once "tabs.php";
        ?>
        </div>


        <!-- plot -->

        <div class="container">
            <section>
                <div class="page-header" id="plot">
                    <h1 class="success">Plot</h1>
                </div>

            </section>
        </div>

        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <div class="dropdown">
                    <select id="company" class="form-control btn-primary">
                    <option value="GOOG">Google</option>
                    <option value="YHOO">Yahoo</option>
                    <option value="MSFT">Microsoft</option>
                    <option value="INTC">Intel</option>
                    <option value="ERIC">Ericsson</option>
                    <option value="MAT">Mattel</option>
                    <option value="CSCO">Cisco</option>
                    <option value="AMZN">Amazon</option>
                    <option value="FB">Facebook</option>
                    <option value="AAPL">Apple</option>
                </select>
                </div>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
        <br><br>
        <div align="center">
            <button id="selectButton" type="button" class="btn btn-warning">Plot</button>
        </div>

        <div id="graph" style="max-width: 80%; height: 400px; margin: 0 auto" align="center"></div>

        <br>

        <!-- Footer -->

        <div id="footer">
            <?php 
        include_once  "footer.php";
        ?>
        </div>

        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="https://code.highcharts.com/stock/highstock.js"></script>
        <script src="http://code.highcharts.com/stock/modules/exporting.js"></script>





        <script type="text/javascript">
            $(document).ready(function() {

                var timeseriesdata = <?=json_encode($timeseriesdata)?>;
                var actualdata = new Array();
                var i = 0;
                var j = 0;
                for (i = timeseriesdata.length - 1; i >= 0; i--) {
                    var year = timeseriesdata[i][0];
                    var month = timeseriesdata[i][1] - 1;
                    var day = timeseriesdata[i][2];
                    var close = timeseriesdata[i][3];
                    actualdata[j] = new Array(Date.UTC(year, month, day), close);
                    j = j + 1;
                }
                console.log(actualdata);

                Highcharts.stockChart('graph', {
                    exporting: {
                        enabled: false
                    },
                    rangeSelector: {
                        enabled: true,
                        inputEnabled: false

                    },
                    title: {
                        text: ''
                    },
                    xAxis: {
                        minRange: 1
                    },
                    series: [{
                        name: 'Stock Value',
                        data: actualdata,
                        tooltip: {
                            valueDecimals: 2
                        }
                    }]
                });
                $("#selectButton").click(function() {
                    $.ajax({
                        type: "POST",
                        url: "plot.php",
                        data: {
                            "name": $("#company").find('option:selected').val()
                        },
                        error: function() {
                            console.log("Error occured while posting.");
                        },
                        success: function(response) {
                            $("#graph").html(response);
                        }

                    });



                });
            });

        </script>

    </body>

    </html>
