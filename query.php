<?php


$stock_ids = explode(",","GOOG,YHOO,MSFT,INTC,ERIC,MAT,CSCO,AMZN,FB,AAPL");
$currentvalue = array();
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


foreach($stock_ids as $id)
{
    $get_data = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=".$id."&f=sd1t1abophgv&e=.csv");
    $tuple = explode(",",$get_data);
    $currentvalue[$id] = $tuple[3];
}



echo '


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
        <link href="tables.css" type="text/css" rel="stylesheet" media="all">
       

    </head>

    <style>
        body {
            padding-top: 40px;
        }
        
        .table th,
        td {
            text-align: center;
        }
        
        .dropdown {
            left: 50%;
            right: auto;
            text-align: center;
            transform: translate(-50%, 0);
        }
        
        .dropdown-menu {
            width: 200px;
            left: 50%;
            margin-left: -100px;
        }

    </style>

    <body data-spy="scroll" data-target="#my-navbar">


        <!-- Navbar -->


        <div id="tabs">';
            
            include_once "tabs.php";
  echo  '
        </div>



        <div class="container">
            <section>
                <div class="page-header" id="faq">
                    <h1 class="success">Queries</h1>
                </div>
                <!-- End Page Header -->

                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <a href="#collapse-1" data-toggle="collapse" data-parent="#accordion">
                                    <p class="text-center">List of companies with their latest stock price</p>
                                </a>
                            </div>
                            <!-- End panel title -->
                            <div id="collapse-1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Company</th>
                                                <th>Ask Price</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ';
                                            
                                        
    foreach($stock_ids as $id)
    {
        echo "<tr>";
         
        echo "<td>$companies[$id]</td>";
        echo "<td>$currentvalue[$id]</td>";
        echo " </tr>";
        
    }
    
    
                                            
                                           
          echo            '                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Panel collapse -->
                        </div>
                    </div>
                </div>
            </section>
        </div>



        <div class="container">
            <h4 class="text-center">Highest, Lowest, and Average stock price of any company</h4>
            <br>
            <div class="row">
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
                    <div class="dropdown">
                        <select id="level" class="form-control btn-primary">
                        <option value="highest">Highest</option>
                        <option value="lowest">Lowest</option>
                        <option value="average">Average</option>
                    </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="dropdown">
                        <select id="timeslot" class="form-control btn-primary">
                        <option value="ten days">10 days</option>
                        <option value="one year">One year</option>
                    </select>
                    </div>
                </div>
                
            </div>
            <br>
            </row>
            <div class="row">
            <div class="col-sm-12 text-center">
                    <button id="multipleQuerySubmit" type="button" class="btn btn-warning">Submit</button>
            </div>
            </row>
        </div>

        <br><br>
        <h3 class="text-center" id = "multipleQuery" style="color:#2d6ca2"></h3>

        <br>
        <div class="container">
            <h4 class="text-center">List of companies with average stock price lesser than the selected company in the latest one year</h4>
            <br>
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4 text-center">
                    <div class="dropdown">
                        <select id="compare" class="form-control btn-primary">
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
            </div>
            <br>
            <div class="row">
            <div class="col-sm-12 text-center">
                <button id="lessthanSubmit" type="button" class="btn btn-warning">Submit</button>
            </div>
            </div>
        </div>

        <br><br>
        <div class="table" id ="lessthanAvg" align= "center" style="margin:0 auto"></div>

        <br><br><br><br><br>

        <!-- Footer -->

        <div id="footer">';
           
        include_once  "footer.php";
     
     echo ' </div>

        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        
        
        <script type = "text/javascript">
            $(document).ready(function() {
                
                $("#multipleQuerySubmit").click(function() {
                    $.ajax({
                        type: "POST",
                        url: "search.php",
                        data: {
                            "company": $("#company").find(\'option:selected\').val(),
                            "level": $("#level").find(\'option:selected\').val(),
                            "timeslot": $("#timeslot").find(\'option:selected\').val()
                        },
                        error: function() {
                            console.log("Error occured while posting");
                        },
                        success: function(response){
                            console.log(response);
                            $("#multipleQuery").html(response);
                        }
                    });
                });
                
                $("#lessthanSubmit").click(function() {
                    $.ajax({
                        type: "POST",
                        url: "lessthan.php",
                        data: {
                            "compare": $("#compare").find(\'option:selected\').val()
                        },
                        error: function() {
                            console.log("Error occured while posting");
                        },
                        success: function(response){
                            console.log(response);
                            $("#lessthanAvg").html(response);
                        }
                    });
                });
                
            });
        </script>

    </body>

    </html>';
              ?>
